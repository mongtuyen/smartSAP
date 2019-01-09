<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chude;
use App\Linhvuc;
class AjaxController extends Controller
{
    public function getChuDe($lv_ma){
        $chude=Chude::where('lv_ma',$lv_ma)->get();
        foreach($chude as $cd){
            echo "<option value='".$cd->cd_ma."'>".$cd->cd_ten."</option>";
        }
    }
}
?>