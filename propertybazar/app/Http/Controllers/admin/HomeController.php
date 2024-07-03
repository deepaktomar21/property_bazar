<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companyee;
use App\Models\Department;

use Illuminate\Support\Facades\Validator;
use response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Http;
use Redirect;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
        // $admin = Auth::guard("admin")->user();
        // echo 'welcome' .$admin->name.' <a href="'.route('admin.logout').'">Logout</a>';
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
      }


    
                  }

