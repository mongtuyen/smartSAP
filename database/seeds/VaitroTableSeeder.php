<?php

use Illuminate\Database\Seeder;

class VaitroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $types=["Quản trị","Tổng biên tập","Nhà báo"];
        sort($types);

        //$today=new Carbon('2018-11-01 18:20:00');
        
        for($i=1;$i<=count($types);$i++){
            array_push($list,[
                'vt_ma'=>$i,
                'vt_ten'=> $types[$i-1]
            ]);
            
        }
        DB::table('vaitro')->insert($list);
    }
}
