<?php

use Illuminate\Database\Seeder;

class LinhvucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $types=["Giáo dục","Thể thao","Giải trí","Văn hóa","Kinh tế","Pháp luật","Công nghệ"];
        sort($types);
        for($i=1;$i<=count($types);$i++){
            array_push($list,[
                'lv_ma'=>$i,
                'lv_ten'=> $types[$i-1]
            ]);
            
        }
        DB::table('linhvuc')->insert($list);
    }
}
