<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baiviet;
use App\Nhanvien;
use App\Chude;

class BaivietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }
    
        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
    
        return $query;
    }
    
    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }
    
        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }
    
        return $this->getAttribute($keyName);
    }
    public function index()
    {
        $ds_baiviet = Baiviet::all(); 
        return view('baiviet.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
            ->with('danhsachbaiviet', $ds_baiviet);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_baiviet=Baiviet::all();
        $ds_chude = Chude::all();
        $ds_nhanvien = Nhanvien::all();
        return view('baiviet.create')->with('danhsachchude',$ds_chude)
            ->with('danhsachnhanvien',$ds_nhanvien);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $baiviet=new Baiviet();
        $baiviet->bv_ma=$request->bv_ma;
        $baiviet->bv_tieuDe=$request->bv_tieuDe;
        $baiviet->bv_ngayDang=$request->bv_ngayDang;
        $baiviet->bv_moTaNgan=$request->bv_moTaNgan;
        $baiviet->bv_noiDung=$request->bv_noiDung;
        $baiviet->bv_soLuotXem=$request->bv_soLuotXem;
        $baiviet->bv_noiBat=$request->bv_noiBat;
        $baiviet->nv_ma=$request->nv_ma;
        $baiviet->cd_ma=$request->cd_ma;
        $baiviet->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachbaiviet.index');
    
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
        $baiviet = Baiviet::where("bv_ma",  $id)->first();
        $ds_nhanvien = Nhanvien::all();
        $ds_chude = Chude::all();
        return view('baiviet.edit')
            ->with('baiviet', $baiviet)
            ->with('danhsachchude', $ds_chude)
            ->with('danhsachnhanvien',$ds_nhanvien);
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
        $baiviet=Baiviet::where("bv_ma",$id)->first();
        //$baiviet->bv_ma=$request->bv_ma;
        $baiviet->bv_tieuDe=$request->bv_tieuDe;
        $baiviet->bv_ngayDang=$request->bv_ngayDang;
        $baiviet->bv_moTaNgan=$request->bv_moTaNgan;
        $baiviet->bv_noiDung=$request->bv_noiDung;
        $baiviet->bv_soLuotXem=$request->bv_soLuotXem;
        $baiviet->bv_noiBat=$request->bv_noiBat;
        $baiviet->nv_ma=$request->nv_ma;
        $baiviet->cd_ma=$request->cd_ma;
        $baiviet->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('danhsachbaiviet.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baiviet=Baiviet::where("bv_ma",$id)->first();
        $baiviet->delete();
        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        return redirect()->route('danhsachbaiviet.index');
    
    }
}
