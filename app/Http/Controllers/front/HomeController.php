<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyImage;
use App\Models\Category;
use App\Models\Ministry;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RuntimeException;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        $categories = Category::where('status',1)->orderby('name','ASC')->get();

        return view('front.index', compact('categories'));
    }

    public function registerUser(){

        $ministries = Ministry::where('status',1)->get();
        return view('front.register-user',compact('ministries'))->render();

    }

    public function storeUser(Request $request){

        $model = new User;
        $data = $request->all();

        $messages = [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O Campo e-mail é obrigatório',
            'email.unique' => 'Já existe um membro registrado com esse e-mail',
            'password.required' => 'O Campo senha é obrigatório',
            'password.min' => 'O campo senha precisa ter 6 caracteres',
            'password.confirmed' => 'As senhas estão diferentes',
            'telephone.required' => 'O Campo Telefone é obrigatório',
            'whatsapp.required' => 'O Campo Whatsapp é obrigatório',
        ];

        $validator = Validator::make($data, [
            'name'      => 'required',
            'email'     => "required|email|max:255|unique:users,email",
            'password'  => 'required|min:6|confirmed',
            'telephone'     => "required",
            'whatsapp'      => "required",
        ], $messages);

        if( $validator->fails() ){
            return response()->json($validator->errors()->first(), 422);
        }

        $model->work_state      = $data['work_state'];
        $model->profession      = $data['profession'];
        $model->ministry_id     = $data['ministry_id'];
        $model->whatsapp        = $data['whatsapp'];
        $model->telephone       = $data['telephone'];
        $model->name            = $data['name'];
        $model->email           = $data['email'];
        $model->status          = 1;
        $model->type            = 'Membro';


        if(isset($data['password']) && $data['password'] != null){
            $model->password = bcrypt($data['password']);
        }

        try{
            $model->save();
        } catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }

        return response()->json('Registro salvo com sucesso', 200);

    }

    public function getCompanyCategory($slug = null){


        if($slug != null){

        $companyCategories = DB::table('company_categories as cc')
                                ->join('companies as co','cc.company_id','co.id')
                                ->join('categories as ca','cc.category_id','ca.id')
                                ->join('users as u','co.user_id','u.id')
                                ->select('cc.id','cc.category_id as category_id','cc.company_id as company_id',
                                'co.document','co.name','co.description','co.telephone','co.telephone',
                                'co.whatsapp','co.instagram','co.facebook','co.youtube','co.site','co.google_maps',
                                'co.slug as company_slug','co.image','co.status','ca.slug','ca.name as category_name',
                                'co.cep','co.address','co.number','co.complement','co.district','city','co.state')
                                ->where('u.status',1)
                                ->where('co.status',1)
                                ->where('ca.slug',$slug)
                                ->get();

        } else {
        $companyCategories = DB::table('companies as co')
                                ->join('company_categories as cc','cc.company_id','co.id')
                                ->join('categories as ca','cc.category_id','ca.id')
                                ->join('users as u','co.user_id','u.id')
                                ->select('co.id',DB::raw("max(cc.category_id) as category_id, max(ca.slug) as slug, max(ca.name) as category_name"),
                                'co.document','co.name','co.description','co.telephone','co.telephone',
                                'co.whatsapp','co.instagram','co.facebook','co.youtube','co.site','co.google_maps',
                                'co.slug as company_slug','co.image','co.status')
                                ->where('u.status',1)
                                ->where('co.status',1)
                                ->groupby('co.id','co.document','co.name','co.description','co.telephone','co.telephone',
                                'co.whatsapp','co.instagram','co.facebook','co.youtube','co.site','co.google_maps',
                                'co.slug','co.image','co.status')
                                ->get();
        }

        foreach($companyCategories as $key => $result){
            if(isJSON($result->image) == true){
                $companyCategories[$key]->image_thumb    = property_exists(json_decode($result->image), 'thumb')    ? json_decode($result->image)->thumb : '';
                $companyCategories[$key]->image_original = property_exists(json_decode($result->image), 'original') ? json_decode($result->image)->original : '';
            }else{
                $companyCategories[$key]->image_thumb    = '';
                $companyCategories[$key]->image_original = '';
            }
        }

        //return response()->json($companyCategories);
        return view('front.company-category',compact('companyCategories'))->render();

    }

    public function getCompany($slug){
        $company       = Company::where('slug',$slug)->first();
        $company_image = CompanyImage::where('company_id',$company->id)->get();

        if(isJSON($company->image) == true){
            $company['image_thumb']    = property_exists(json_decode($company->image), 'thumb')    ? json_decode($company->image)->thumb : '';
            $company['image_original'] = property_exists(json_decode($company->image), 'original') ? json_decode($company->image)->original : '';
        }else{
            $company['image_thumb']    = '';
            $company['image_original'] = '';
        }
        return view('front.modal-company',compact('company','company_image'))->render();
    }


    public function getCategories(Request $request){

        $category = $request->input('category');

        $result = Category::whereraw("name LIKE '%$category%'")
        ->orderby('name','ASC')
        ->take(20)
        ->get();
        return response()->json($result);


    }


}
