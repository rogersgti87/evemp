<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ministry;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RuntimeException;


class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(){

        $categories = Category::where('status',1)->get();

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
        ];

        $validator = Validator::make($data, [
            'name'      => 'required',
            'email'     => "required|email|max:255|unique:users,email",
            'password'  => 'required|min:6|confirmed',
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
        $model->status          = 0;
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
}
