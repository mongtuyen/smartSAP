<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('danhsachbaiviet.index');
    }
    // public function getdangnhapAdmin(){
    //     return view('home');
    // }
    // public function postdangnhapAdmin(Request $request){
    //    if(Auth::attemp(['email'=>$request->email,'password'=>$request->password])){
    //         return redirect('danhsachbaiviet.index');
    //    }
    //    else{
    //        return redirect('\home')->with('thong bao','Login fail');
    //    } 
    // }
    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('/home');
    }
}
