<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Show login page
    public function showLogin(){
        return view('pages/login');
    }
    //Show register page
    public function showRegister(){
        return view('pages/register');
    }
    //Register User
    public function postRegister(Request $request){
       dd($request->all());
    }
    //Login User
    //Reset Password


}
