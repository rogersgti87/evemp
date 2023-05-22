<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use DB;
use App\Models\Category;
use App\Models\CompanyCategory;
use App\Models\Company;
use App\Models\User;
use RuntimeException;
use ResponseCache;

class CompanyController extends Controller
{


    public function __construct(Request $request)
    {
        $this->request              = $request;

        $this->datarequest = [
            'title'             => 'Empresas',
            'link'              => 'admin/companies',
            'filter'            => 'admin/companies?filter',
            'linkFormAdd'       => 'admin/companies/form?act=add',
            'linkFormEdit'      => 'admin/companies/form?act=edit',
            'linkStore'         => 'admin/companies',
            'linkUpdate'        => 'admin/companies/',
            'linkCopy'          => 'admin/companies/copy',
            'linkDestroy'       => 'admin/companies',
            'breadcrumb_new'    => 'Nova Empresa',
            'breadcrumb_edit'   => 'Editar Empresa',
            'path'              => 'admin.company.'
        ];

    }

    public function index(){

        $column    = $this->request->input('column');
        $order     = $this->request->input('order') == 'desc' ? 'asc' : 'desc';

        if($column){
            $column = $this->request->input('column');
            $column_name = "$column $order";
        } else {
            $column_name = "id desc";
        }

        $field     = $this->request->input('field')    ? $this->request->input('field')    : 'name';
        $operator  = $this->request->input('operator') ? $this->request->input('operator') : 'like';
        $value     = $this->request->input('value')    ? $this->request->input('value')    : '';

        if($field == 'data' || $field == 'dataini' || $field == 'datafim' || $field == 'date'){
            $value = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }

        if($field == 'created_at'){
            $field = 'CAST(created_at as DATE)';
            $value = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }


        if($field == 'category_id'){
            $value = implode(',',$value);
            $newValueCategory = " id in (select cc.company_id from company_categories as cc
            inner join categories as c on c.id = cc.category_id where cc.category_id in($value))";
        }

        if($field != 'category_id'){
            if($operator == 'like'){
                $newValue = "'%$value%'";
            }else{
                $newValue = "'$value'";
            }
        }

        if(\Auth::user()->type == 'Usuario'){

            if($this->request->input('filter') && $field == 'category_id'){
                $data = Company::orderByRaw("$column_name")
                ->whereraw("$newValueCategory")
                ->paginate(15);
            }
            else if($this->request->input('filter')){
                $data = Company::orderByRaw("$column_name")
                            ->whereraw("$field $operator $newValue")
                            ->paginate(15);
            }else{
                $data = Company::orderByRaw("$column_name")
                            ->paginate(15);
            }

        } else {

            if($this->request->input('filter') && $field == 'category_id'){
                $data = Company::orderByRaw("$column_name")
                ->where('user_id',\Auth::user()->id)
                ->whereraw("$newValueCategory")
                ->paginate(15);
            }
            else if($this->request->input('filter')){
                $data = Company::orderByRaw("$column_name")
                            ->where('user_id',\Auth::user()->id)
                            ->whereraw("$field $operator $newValue")
                            ->paginate(15);
            }else{
                $data = Company::orderByRaw("$column_name")
                            ->where('user_id',\Auth::user()->id)
                            ->paginate(15);
            }
        }


        foreach($data as $key => $result){
            if(isJSON($result->image) == true){
                $data[$key]['image_thumb']    = property_exists(json_decode($result->image), 'thumb')    ? json_decode($result->image)->thumb : '';
                $data[$key]['image_original'] = property_exists(json_decode($result->image), 'original') ? json_decode($result->image)->original : '';
            }else{
                $data[$key]['image_thumb']    = '';
                $data[$key]['image_original'] = '';
            }
        }



        $categories = DB::table('company_categories as cc')
                        ->select('cc.company_id as company_id','cc.category_id as category_id','c.name as category')
                        ->join('categories as c','c.id','cc.category_id')
                        ->get();


        return view($this->datarequest['path'].'.index',compact('column','order','data','categories'))->with($this->datarequest);
    }

    public function form(){

        if($this->request->input('act') == 'add'){
            $users = User::where('status',1)->get();
            $user = User::where('id',\Auth::user()->id)->first();
            return view($this->datarequest['path'].'form',compact('users','user'))->with($this->datarequest);
        }else if($this->request->input('act') == 'edit'){
            $users = User::where('status',1)->get();
            $user = User::where('id',\Auth::user()->id)->first();
            $this->datarequest['linkFormEdit'] = $this->datarequest['linkFormEdit'].'&id='.$this->request->input('id');
            $this->datarequest['linkUpdate']   = $this->datarequest['linkUpdate'].$this->request->input('id');

            if(\Auth::user()->type == 'Membro'){
                $data = Company::where('id',$this->request->input('id'))->where('user_id', \Auth::user()->id )->first();
                if(is_null($data)){
                    return redirect('/admin/companies');
                }
            }else{
                $data = Company::where('id',$this->request->input('id'))->first();
            }

            $categories = DB::table('company_categories as cc')
                        ->select('cc.company_id as company_id','cc.category_id as category_id','c.name as category')
                        ->join('categories as c','c.id','cc.category_id')
                        ->where('cc.company_id',$data->id)
                        ->get();

            if(isJSON($data->image) == true){
                    $data['image_thumb']    = property_exists(json_decode($data->image), 'thumb')    ? json_decode($data->image)->thumb : '';
                    $data['image_original'] = property_exists(json_decode($data->image), 'original') ? json_decode($data->image)->original : '';
                }else{
                    $data['image_thumb']    = '';
                    $data['image_original'] = '';
                }


            return view($this->datarequest['path'].'form',compact('data','categories','users','user'))->with($this->datarequest);
        }else{
            return view($this->datarequest['path'].'index')->with($this->datarequest);
        }

    }


    public function store()
    {

        $newCompany          = new Company;

        $data = $this->request->all();

        $messages = [
            'document.required' => 'O campo CPF/CNPJ é obrigatório',
            'document.unique' => 'O campo CPF/CNPJ já está cadastrado para outra empresa',
            'name.required' => 'O campo nome da empresa é obrigatório',
            'description.required' => 'O Campo descrição da empresa é obrigatório',
        ];

        $validator = Validator::make($data, [
            'document'     => "required|unique:companies,document",
            'name'          => "required",
            'description'   => "required",
        ],$messages);

        if( $validator->fails() ){
            return response()->json($validator->errors()->first(), 422);
        }

        $verifySlug = Company::where('slug',Str::slug($data['name']))->count();

        if ($verifySlug > 0) {
            $pieces = explode('-', Str::slug($data['name']));
            $count = intval(end($pieces));
            $status = false;
            $count = 0;
            while($status != true){
                $newCompany->slug = Str::slug($data['name']).'-' . ($count + 1);
                $verifySlug = Company::where('slug',$newCompany->slug)->count();
                if($verifySlug <= 0){
                    $status = true;
                }
                $count++;
            }
        } else {
            $newCompany->slug          = Str::slug($data['name']);
        }

        $newCompany->user_id            = $data['user_id'];
        $newCompany->document           = $data['document'];
        $newCompany->telephone          = $data['telephone'];
        $newCompany->email              = $data['email'];
        $newCompany->whatsapp           = $data['whatsapp'];
        $newCompany->instagram          = $data['instagram'];
        $newCompany->facebook           = $data['facebook'];
        $newCompany->youtube            = $data['youtube'];
        $newCompany->site               = $data['site'];
        $newCompany->google_maps        = $data['google_maps'];
        $newCompany->image              = $data['image'];
        $newCompany->name               = $data['name'];
        $newCompany->description        = $data['description'];

        if(\Auth::user()->type == 'Membro'){
            $newCompany->status         = 0;
        }else{
            $newCompany->status             = $data['status'];
        }




        try{
            $newCompany->save();

        foreach($data['categories'] as $category){
                    $newCompanyCategory  = new CompanyCategory;
                    $newCompanyCategory->category_id   = $category;
                    $newCompanyCategory->company_id       = $newCompany->id;
                    $newCompanyCategory->save();
                }


            ResponseCache::clear();
        } catch(\Exception $e){
            \Log::info($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }

        return response()->json('Registro salvo com sucesso', 200);


    }

    public function copy()
    {

        $model = new Company;
        $data = $this->request->all();

        if(!isset($data['selected'])){
            return response()->json('Selecione ao menos um registro', 422);
        }

        try{
            foreach($data['selected'] as $result){
                $find = $model->find($result);
                $newRegister = $find->replicate();

                $pieces = explode('-', Str::slug($newRegister->name));
                $count = intval(end($pieces));
                $status = false;
                $count = 0;
                while($status != true){
                    $newRegister->name = $newRegister->name.'-'.$count + 1;
                    $newRegister->slug = Str::slug($newRegister->name).'-' . ($count + 1);
                    $verifySlug = Company::where('slug',$newRegister->slug)->count();
                    if($verifySlug <= 0){
                        $status = true;
                    }
                    $count++;
                }

                $newRegister->save();

                $findCompanyCategory = CompanyCategory::where('company_id',$find->id)->get();

                foreach($findCompanyCategory as $category){
                    $newCompanyCategory  = new CompanyCategory;
                    $newCompanyCategory->category_id   = $category->category_id;
                    $newCompanyCategory->company_id       = $newRegister->id;
                    $newCompanyCategory->save();
                }

                ResponseCache::clear();
            }

        } catch(\Exception $e){
            \Log::info($e->getMessage());
            return response()->json($e->getMessage(), 500);

        }


        return response()->json(true, 200);


    }


    public function update($id)
    {

        $newCompany = Company::where('id',$id)->first();

        $data = $this->request->all();

        $messages = [
            'document.required' => 'O campo CPF/CNPJ é obrigatório',
            'document.unique' => 'O campo CPF/CNPJ já está cadastrado para outra empresa',
            'name.required' => 'O campo nome da empresa é obrigatório',
            'description.required' => 'O Campo descrição da empresa é obrigatório',
        ];

        $validator = Validator::make($data, [
            'document'      => "required|unique:companies,document,$id",
            'name'          => "required",
            'description'   => "required",
        ],$messages);

        if( $validator->fails() ){
            return response()->json($validator->errors()->first(), 422);
        }

        $verifySlug = Company::where('slug',Str::slug($data['name']))->where('id','!=',$id)->count();

        if ($verifySlug > 0) {
            $pieces = explode('-', Str::slug($data['name']));
            $count = intval(end($pieces));
            $status = false;
            $count = 0;
            while($status != true){
                $newCompany->slug = Str::slug($data['name']).'-' . ($count + 1);
                $verifySlug = Company::where('slug',$newCompany->slug)->count();
                if($verifySlug <= 0){
                    $status = true;
                }
                $count++;
            }
        } else {
            $newCompany->slug          = Str::slug($data['name']);
        }

        $newCompany->user_id            = $data['user_id'];
        $newCompany->document           = $data['document'];
        $newCompany->telephone          = $data['telephone'];
        $newCompany->email              = $data['email'];
        $newCompany->whatsapp           = $data['whatsapp'];
        $newCompany->instagram          = $data['instagram'];
        $newCompany->facebook           = $data['facebook'];
        $newCompany->youtube            = $data['youtube'];
        $newCompany->site               = $data['site'];
        $newCompany->google_maps        = $data['google_maps'];
        $newCompany->image              = $data['image'];
        $newCompany->name               = $data['name'];
        $newCompany->description        = $data['description'];

        if(\Auth::user()->type == 'Membro'){
            unset($data['status']);
        }else{
            $newCompany->status             = $data['status'];
        }

        try{
            $newCompany->save();

            CompanyCategory::where('company_id',$id)->delete();

            foreach($data['categories'] as $category){
                $newCompanyCategory  = new CompanyCategory;
                $newCompanyCategory->category_id   = $category;
                $newCompanyCategory->company_id       = $id;
                $newCompanyCategory->save();
            }

            ResponseCache::clear();
        } catch(\Exception $e){
            \Log::info($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }


        return response()->json('Registro salvo com sucesso', 200);

    }

    public function destroy()
    {
        $model = new Company;
        $data = $this->request->all();

        if(!isset($data['selected'])){
            return response()->json('Selecione ao menos um registro', 422);
        }

        try{
            foreach($data['selected'] as $result){

                CompanyCategory::where('company_id',$result)->delete();

                $find = $model->where('id',$result);
                $find->delete();
                ResponseCache::clear();
            }

        } catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json('Erro interno, favor comunicar ao administrador', 500);
        }


        return response()->json(true, 200);


    }


}
