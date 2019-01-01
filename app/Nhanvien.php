<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    public    $timestamps   = false;
    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_hoTen', 'nv_taiKhoan', 'nv_matKhau', 'nv_email','nv_ngaySinh','nv_dienThoai', 'nv_diaChi','nv_gioiTinh', 'vt_ma'];
    protected $guarded      = ['nv_ma'];
    protected $primaryKey   = 'nv_ma';
    protected $dates        = ['nv_ngaySinh'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function vaiTro(){
        return $this->belongsTo('App\Vaitro', 'vt_ma','vt_ma');
    }
    public function baiViets()
    {
        return $this->hasMany('App\Baiviet', 'nv_tacGia', 'nv_ma');
    }
    /*public function duyetBais()
    {
        return $this->hasMany('App\Duyetbai', 'nv_ma', 'db_nguoiDuyet');
    }*/
}
