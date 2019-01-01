<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    public    $timestamps   = false;
    protected $table        = 'hinhanh';
    protected $fillable     = ['ha_ten','bv_ma'];
    protected $guarded      = ['ha_ma'];
    protected $primaryKey   = 'ha_ma';
    public function baiViet()
    {
        return $this->belongsTo('App\Baiviet', 'bv_ma', 'bv_ma');
    }
}
