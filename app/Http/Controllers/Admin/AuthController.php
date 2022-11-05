<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){

        return view('admin.auth.login');
    }
    public function dologin(Request $request){

        $data=$request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);

        if(!auth()->guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return back();
        }

        else{
          return redirect(route('admin.home'));
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
