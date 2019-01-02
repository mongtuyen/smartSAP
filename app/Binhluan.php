<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    public    $timestamps   = false;
    protected $table        = 'binhluan';
    protected $fillable     = ['bl_noiDung', 'bl_ngayDang', 'bl_trangThai','nv_duyet','bv_ma','nd_ma'];
    protected $guarded      = ['bl_ma'];
    protected $primaryKey   = 'bl_ma';
    protected $dates        = ['bl_ngayDang'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function baiViet(){
        return $this->belongsTo('App\Baiviet', 'bv_ma','bv_ma');
    }
    public function nguoiDoc(){
        return $this->belongsTo('App\Nguoidoc', 'nd_ma','nd_ma');
    }
    public function nhanVien(){
        return $this->belongsTo('App\Nhanvien','nv_ma', 'nv_duyet');
    }
}
