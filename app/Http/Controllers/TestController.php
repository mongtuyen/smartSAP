<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
class TestController extends Controller
{
    public function check(Request $request)
    {
    	$data=[
    		'username'=>$request->username,
    		'password'=>$request->password,
    	];
    	if(Auth::attempt($data)){
            return redirect()->route('danhsachbaiviet.index');
            
    	}else{
            Session::flash('alert-danger','Login fail');
          
            return redirect()->route('login');
    	}
    }
    /*public function logout(Request $request){
        if(Auth::logout()){
            return redirect()->route('welcome');
        }
    }*/
}
