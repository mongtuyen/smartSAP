<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Linhvuc;
use App\Chude;
class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chude = DB::table('chude')->get();
        
        return view('chude.index')
            ->with('danhsachchude', $ds_chude);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_linhvuc = Linhvuc::all(); 
        return view('chude.create')
            ->with('danhsachlinhvuc', $ds_linhvuc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chude=new Chude();
        $chude->cd_ten=$request->cd_ten;
        $chude->lv_ma = $request->lv_ma;
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('danhsachchude.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chude = Chude::where("cd_ma", $id)->first();
        $ds_linhvuc=Linhvuc::all();
        return view('chude.edit')
            ->with('chude', $chude)
            ->with('danhsachlinhvuc',$ds_linhvuc);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chude = Chude::where("cd_ma", $id)->first();
        $chude->cd_ten = $request->cd_ten;
        $chude->lv_ma=$request->lv_ma;
        $chude->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachchude.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chude = Chude::where("cd_ma",  $id)->first();
        $chude->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachchude.index');
    }
}
