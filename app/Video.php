<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public    $timestamps   = false;
    protected $table        = 'video';
    protected $fillable     = ['vd_ten','bv_ma'];
    protected $guarded      = ['vd_ma'];
    protected $primaryKey   = 'vd_ma';
    public function baiVietLienQuan()
    {
        return $this->belongsTo('App\Baiviet', 'bv_ma', 'bv_ma');
    }
}
