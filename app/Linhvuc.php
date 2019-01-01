<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linhvuc extends Model
{
    public    $timestamps   = false;
    protected $table        = 'linhvuc';
    protected $fillable     = ['lv_ten'];
    protected $guarded      = ['lv_ma'];
    protected $primaryKey   = 'lv_ma';
    public function chuDes()
    {
        return $this->hasMany('App\Chude', 'lv_ma', 'lv_ma');
    }
}
