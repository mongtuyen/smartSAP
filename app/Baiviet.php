<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nhanvien;
use App\Chude;
class Baiviet extends Model
{
    public    $timestamps   = false;
    protected $table        = 'baiviet';
    protected $fillable     = ['bv_tieuDe','bv_ngayDang','bv_moTaNgan','bv_hinh','bv_noiDung','bv_soLuotXem','bv_noiBat','nv_ma','cd_ma'];
    protected $guarded      = ['bv_ma'];
    protected $primaryKey   = ['bv_ma'];
    protected $dates        = ['bv_ngayDang'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    
    public function hinhAnhs(){
        return $this->hasMany('App\Hinhanh', 'bv_ma','bv_ma');
    }
    public function videos(){
        return $this->hasMany('App\Video', 'bv_ma','bv_ma');
    }
    // public function cuatacGia(){
    //     return $this->belongsTo('App\Nhanvien','nv_ma', 'nv_ma');
    // }
    public function cuaTG(){
        return $this->belongsTo('App\Nhanvien', 'nv_ma','nv_ma');
    }
    public function thuocchuDe(){
        return $this->belongsTo('App\Chude', 'cd_ma','cd_ma');
    }
    public function comment(){
        return $this->hasMany('App\Binhluan','bv_ma','bv_ma');
    }
}
