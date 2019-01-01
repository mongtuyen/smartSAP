<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguoidoc extends Model
{
    public    $timestamps   = false;
    protected $table        = 'nguoidoc';
    protected $fillable     = ['nd_hoTen','nd_email'];
    protected $guarded      = ['nd_ma'];
    protected $primaryKey   = 'nd_ma';
    public function binhLuans()
    {
        return $this->hasMany('App\Binhluan', 'bl_ma', 'bl_ma');
    }
}
