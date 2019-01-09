<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Linhvuc;
use Session;
class LinhvucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_linhvuc = DB::table('linhvuc')->get();
        
        return view('linhvuc.index')
            ->with('danhsachlinhvuc', $ds_linhvuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linhvuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $linhvuc=new Linhvuc();
        $linhvuc->lv_ma=$request->lv_ma;
        $linhvuc->lv_ten=$request->lv_ten;
        $linhvuc->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachlinhvuc.index');
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
        $linhvuc = Linhvuc::where("lv_ma", $id)->first();
        return view('linhvuc.edit')->with('linhvuc', $linhvuc);
    
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
        $linhvuc = Linhvuc::where("lv_ma", $id)->first();
        $linhvuc->lv_ten = $request->lv_ten;
        $linhvuc->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachlinhvuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linhvuc = Linhvuc::where("lv_ma",  $id)->first();
        $linhvuc->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachlinhvuc.index');
    
    }
}
