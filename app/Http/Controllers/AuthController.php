<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        //validation
      $request->validate([
        'name'=>'required|min:3|max:255',
        'email'=>'required|email|max:255|unique:users',
        'password'=>'required|min:8|confirmed',
      ]);
//registeration
     $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
      ]);

      //login
      Auth::login($user);

      return back()->with('success','Successfully Logged In!');
    }
    //Login User
public function postLogin(Request $request){
  // dd($request->all());

  //Validate
  $details = $request->validate([
    'email'=>'required|email',
    'password'=>'required',
  ]);
  //Login
  if(Auth::attempt($details)){
    return redirect()->intended('home');
  }

  //Response
  return back()->withErrors([
    'email' => 'Invalid Login Details'
  ]);
}


    //Logout
    public function logout(){
      Auth::logout();
      return back();
    }
    //Reset Password


}
