<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhanvien;
use App\Vaitro;
use Session;
class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        try{
            $nhanvien=Nhanvien::where("nv_taiKhoan", $request->taiKhoan)
                        ->where("nv_matKhau",md5($request->matKhau))->first();
            if($nhanvien){
                $request->session()->put('qt_nv', $nhanvien->nv_taiKhoan);
                $request->session()->put('qt_ht',$nhanvien->nv_hoTen);
                $request->session()->put('qt_vt',$nhanvien->vt_ma);
                return response(['error'=>false, 'message'=>"Đăng nhập thành công"],200);
            }else{
                return response(['error'=>true, 'message'=>"Tài khoản và mật khẩu không hợp lệ"],200);
            }
        }catch(QueryException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()],200);
        }catch(PDOException $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()],200);
        }catch(Exception $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()],200);
        }
    }

    public function logout(Request $request){
        try{
            if($request->session()->exists('qt_nv')){
                $request->session()->forget('qt_nv');
            }
            if($request->session()->exists('qt_ht'))
                $request->session()->forget('qt_ht');
            
            if($request->session()->exists('qt_q'))
                $request->session()->forget('qt_q');
            return response(['error'=>false, 'message'=>"Đăng xuất thành công"],200);
        }catch(Exception $ex){
            return response(['error'=>true, 'message'=>$ex->getMessage()],200);
        }
    }
    public function index()
    {
        $ds_nhanvien = Nhanvien::all(); 
        return view('nhanvien.index')
            ->with('danhsachnhanvien', $ds_nhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_vaitro = Vaitro::all(); 
        return view('nhanvien.create')
            ->with('danhsachvaitro', $ds_vaitro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new Nhanvien();
        $nhanvien->nv_ma = $request->nv_ma;
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->nv_dienThoai = $request->nv_dienThoai;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->vt_ma = $request->vt_ma;
        $nhanvien->save();
        Session::flash('alert-info', 'Thêm thảnh công!');
        return redirect()->route('danhsachnhanvien.index');
    
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
        $nhanvien = Nhanvien::where("nv_ma",  $id)->first();
        $ds_vaitro = Vaitro::all();

        return view('nhanvien.edit')
            ->with('nhanvien', $nhanvien)
            ->with('danhsachvaitro', $ds_vaitro);
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
        $nhanvien = Nhanvien::where("nv_ma",  $id)->first();
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->nv_dienThoai = $request->nv_dienThoai;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->vt_ma = $request->vt_ma;
        $nhanvien->save();
        

        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('danhsachnhanvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = Nhanvien::where("nv_ma",  $id)->first();
        $nhanvien->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachnhanvien.index');
    }
}
