<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chude extends Model
{
    public    $timestamps   = false;
    protected $table        = 'chude';
    protected $fillable     = ['cd_ten','lv_ma'];
    protected $guarded      = ['cd_ma'];
    protected $primaryKey   = 'cd_ma';
    public function linhVuc()
    {
        return $this->belongsTo('App\Linhvuc', 'lv_ma', 'lv_ma');
    }
    public function baiViets()
    {
        return $this->hasMany('App\Baiviet', 'bv_ma', 'bv_ma');
    }
}
