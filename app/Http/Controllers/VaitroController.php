<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaitro;
use DB;
use Session;




class VaitroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_vaitro = DB::table('vaitro')->get();
        
        return view('vaitro.index')
            ->with('danhsachvaitro', $ds_vaitro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaitro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $vaitro=new Vaitro();
        $vaitro->vt_ma=$request->vt_ma;
        $vaitro->vt_ten=$request->vt_ten;
        $vaitro->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachvaitro.index');
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
        $vaitro = Vaitro::where("vt_ma", $id)->first();
        return view('vaitro.edit')->with('vaitro', $vaitro);
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


        $vaitro = Vaitro::where("vt_ma", $id)->first();
        $vaitro->vt_ten = $request->vt_ten;
        $vaitro->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachvaitro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaitro = Vaitro::where("vt_ma",  $id)->first();
        $vaitro->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachvaitro.index');
    }
}
