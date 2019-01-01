<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaitro extends Model
{
    public    $timestamps   = false;
    protected $table        = 'vaitro';
    protected $fillable     = ['vt_ten'];
    protected $guarded      = ['vt_ma'];
    protected $primaryKey   = 'vt_ma';
    
    public function nhanViens()
    {
        return $this->hasMany('App\Nhanvien', 'vt_ma', 'vt_ma');
    }

}
