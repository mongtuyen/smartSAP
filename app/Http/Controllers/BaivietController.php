<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baiviet;
use App\Nhanvien;
use DB;
use App\Chude;
use App\Linhvuc;
class BaivietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        $ds_baiviet = DB::table('baiviet')->get();
        
        return view('baiviet.index')
            ->with('danhsachbaiviet', $ds_baiviet);
        // $ds_baiviet = Baiviet::all()
        //     // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        //     ->with('danhsachbaiviet', $ds_baiviet);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_linhvuc=Linhvuc::all();
        $ds_baiviet=Baiviet::all();
        $ds_chude = Chude::all();
        $ds_nhanvien = Nhanvien::all();
        return view('baiviet.create',['danhsachchude'=>$ds_chude,'danhsachnhanvien'=>$ds_nhanvien,'danhsachlinhvuc'=>$ds_linhvuc]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'cd_ma'=>'required',
           'bv_tieuDe'=>'required|min:3',
           'bv_moTaNgan'=>'required',
           'bv_noiDung'=>'required',
           
           
           
       ],[
           'cd_ma.required'=>"Bạn chưa chọn chủ đề",
           'bv_tieuDe.required'=>"Bạn chưa nhập tiêu đề",
           'bv_moTaNgan.required'=>"Bạn chưa nhập mô tả",
           'bv_noiDung.required'=>"Bạn chưa nhập nội dung",
       ]);
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
        if($request->hasFile('bv_hinh'))
        {
            $file = $request->bv_hinh;

            // Lưu tên hình vào column sp_hinh
            $baiviet->bv_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $baiviet->bv_hinh);
        }
        else{
            $baiviet->bv_hinh="";
        }
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
        $ds_linhvuc=Linhvuc::all();
        $ds_chude = Chude::all();
        return view('baiviet.edit',['danhsachchude'=>$ds_chude,'danhsachnhanvien'=>$ds_nhanvien,'danhsachlinhvuc'=>$ds_linhvuc]);
    
        // return view('baiviet.edit')
        //     ->with('baiviet', $baiviet)
        //     ->with('danhsachchude', $ds_chude)
        //     ->with('danhsachnhanvien',$ds_nhanvien);
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
        if($request->hasFile('bv_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $baiviet->bv_hinh);

            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->bv_hinh;
            $baiviet->bv_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $baiviet->bv_hinh);
        }
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
        if(empty($baiviet) == false)
        {
            Storage::delete('public/photos/' . $baiviet->bv_hinh);
        }
        $baiviet->delete();
        Session::flash('alert-info', 'Xóa thành công!');
        return redirect()->route('danhsachbaiviet.index');
    
    }
}
