<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use App\Models\Customers;

class UserController extends Controller
{
    private $custom;
    private $admin;
    public function __construct(){
        $this->custom = new Customers();
        $this->admin  = new Admin();
    }

    public function login(){
        return view('admin.account');
    }

    public function postlogin(Request $req){
        $rules = [
            'loginMail'  => 'required'
            ,'loginPass' => 'required'
        ];
        $mesage = [
            'loginMail.required' => 'This field email is required!'
            ,'loginMail.required' => 'This field email is required!'
        ];
        $req->validate($rules, $mesage);
        $email          = $req->loginMail;
        $password       = $req->loginPass;
        $remember_token = $req->has('remember')?true:false;
        $admin          = Auth::guard('admins')->attempt(['email' => $email, 'password' => $password], $remember_token);
        $customer       = Auth::guard('customers')->attempt(['email' => $email, 'password' => $password], $remember_token);
        if($admin==true && $customer==false){
            $id   = Auth::guard('admins')->id();
            $user = $this->admin->getadmin($id);
            $name = $user[0]->fullname;
            //--muc put cac session by NAMVU
            // Session::put('cart','nam');
            //end
            return redirect()->route('admin.home');
        }else if($admin==false && $customer==true){
            //--st
            // Session::put('cart','nam');
            //end
            return redirect()->route('user.home');
        }else{
            return redirect()->back()->with('msg', ('This Account not exists!'));
        }
    }

    public function logout(){
        Auth::guard('admins')->logout();
        Auth::guard('customers')->logout();

        //--muc xoa cac session by NAMVU
        Session::flush();
        //--end
        return redirect()->route('user.home');
    }

    public function register(){
        return view('admin.register');
    }

    public function postregis(Request $req){
        $rules = [
            'userName'   => 'required|regex:/[^!@#$%^&*()]*$/'
            ,'userMail'  => 'required|email|unique:customers,email'
            ,'userPass'  => 'required|min:6'
            ,'userRePass'=> 'required|same:userPass'
        ];
        $mesage = [
            'required'           => 'This field is required!'
            ,'userName.regex'    => 'Username must be not including special characters!'
            ,'userMail.email'    => 'This email not exists!'
            ,'userMail.unique'   => 'This email already exists!'
            ,'userPass.min'      => 'Password must be more than 6 characters!'
            ,'userRePass'        => 'Password not the same!'
        ];
        $req->validate($rules, $mesage);

        $fullname = $req->userName;
        $email    = $req->userMail;
        $pass     = $req->userPass;
        $password = bcrypt($pass);
        $data = [$fullname, $email, $password];


        if(($this->custom->regist($data))==null){
            return redirect()->route('user.login')->with('msg', 'Register Users successfully!');
        }else{
            return redirect()->route('user.login')->with('msg', 'Register Users fail!');
        }

    // about us
    }

    public function aboutus(){
        return view('admin.aboutus');
    }
}
