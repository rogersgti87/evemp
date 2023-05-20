<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use DB;
use App\Models\User;
use App\Models\Company;
use RuntimeException;
use ResponseCache;

class AdminController extends Controller
{


    public function __construct(Request $request)
    {
        $this->request              = $request;

        $this->datarequest = [
            'title'             => 'Dashboard',
            'link'              => 'admin/',
            'path'              => 'admin'
        ];

    }

    public function index(){

        $users      = User::where('status',0)->get();
        $companies  = Company::where('status',0)->get();

        return view($this->datarequest['path'].'.dashboard',compact('users','companies'))->with($this->datarequest);
    }




}
