<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    public    $timestamps   = false;
    protected $table        = 'slide';
    protected $fillable     = ['sl_ten','sl_hinh','sl_noiDung', 'sl_link'];
    protected $guarded      = ['sl_ma'];
    protected $primaryKey   = 'sl_ma';
}
