<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duyetbai extends Model
{
    public    $timestamps   = false;
    protected $table        = 'duyetbai';
    protected $fillable     = ['db_trangThai','db_thoiGian'];
    protected $guarded      = ['db_nguoiDuyet','db_baiViet'];
    protected $primaryKey   = ['db_nguoiDuyet','db_baiViet'];
    protected $dates        = ['db_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    /*public function baiVietLienQuan(){
        return $this->belongsTo('App\Baiviet', 'bv_ma','bv_ma');
    }
    public function nguoiDuyet(){
        return $this->belongsTo('App\Nhanvien', 'db_nguoiDuyet','nd_ma');
    }*/
    
}
