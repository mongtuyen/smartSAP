<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nhanvien extends Authenticatable
{
    use Notifiable;
    public    $timestamps   = false;
    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_hoTen', 'nv_taiKhoan', 'nv_matKhau', 'nv_email','nv_ngaySinh','nv_dienThoai', 'nv_diaChi','nv_gioiTinh','vt_ma'];
    protected $guarded      = ['nv_ma'];
    protected $primaryKey   = 'nv_ma';
    protected $dates        = ['nv_ngaySinh'];
    protected $hidden = [
        'nv_matKhau',
    ];
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
