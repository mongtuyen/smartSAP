<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
//use Illuminate\PhpVnDataGenerator\VnFullname;
//use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class BinhluanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        //$uFN = new VnFullname();
       // $uPI = new VnPersonalInfo();
        for ($i=1; $i <= 30; $i++) {
            $today = new DateTime();
            array_push($list, [
                'bl_ngayDang'             => $today->format('Y-m-d H:i:s'),
                'bl_noiDung'              => "bl_noiD $i",
                'nv_duyet'                => $i,
                'nd_ma'                   => $i,
                'bl_trangThai'            => $i,
                'bv_ma'                   =>$i
            ]);
        }
        DB::table('binhluan')->insert($list);
    }
}
