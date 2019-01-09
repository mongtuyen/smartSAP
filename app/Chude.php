<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Linhvuc;
class Chude extends Model
{
    public    $timestamps   = false;
    protected $table        = 'chude';
    protected $fillable     = ['cd_ten','lv_ma'];
    protected $guarded      = ['cd_ma'];
    protected $primaryKey   = 'cd_ma';
    public function khung()
    {
        return $this->belongsTo('App\Linhvuc', 'lv_ma', 'lv_ma');
    }
    public function baiViets()
    {
        return $this->hasMany('App\Baiviet', 'bv_ma', 'bv_ma');
    }
    public function slbaiViet()
    {
        return $this->hasManyThrough('App\Baiviet','App\Chude', 'bv_ma', 'bv_ma');
    }

}
