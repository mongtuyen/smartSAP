<?php

use Illuminate\Database\Seeder;

class ChudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $types1=["CNTT - Viễn thông","Thiết bị - Phần cứng"];
        sort($types1);
        for($i=1;$i<=count($types1);$i++){
            array_push($list,[
                'cd_ma'=>$i,
                'cd_ten'=> $types1[$i-1],
                'lv_ma'=>'1'
            ]);    
        }
   
        $types=["Học bổng - Du học","Đào tạo - Thi cử"];
        sort($types);
        for($i=1,$j=3;$i<=count($types);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types[$i-1],
                'lv_ma'=>'2'
            ]);           
        }

        

        $types2=["Âm nhạc","Thời trang", "Điện ảnh - Truyền hình"];
        sort($types2);
        for($i=1,$j=5;$i<=count($types2);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types2[$i-1],
                'lv_ma'=>'3'
            ]);           
        }

        $types4=["Lao động - Việc làm","Tài chính", "Chứng khoán"];
        sort($types4);
        for($i=1,$j=8;$i<=count($types4);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types4[$i-1],
                'lv_ma'=>'4'
            ]);           
        }

        $types6=["Hình sự - Dân sự","An ninh - Trật tự"];
        sort($types6);
        for($i=1,$j=11;$i<=count($types6);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types6[$i-1],
                'lv_ma'=>'5'
            ]);                 
        }

        $types5=["Bóng đá quốc tế","Bóng đá Việt Nam"];
        sort($types5);
        for($i=1,$j=13;$i<=count($types5);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types5[$i-1],
                'lv_ma'=>'6'
            ]);          
        }

        $types3=["Nghệ thuật","Ẩm thực", "Du lịch"];
        sort($types3);
        for($i=1,$j=15;$i<=count($types3);$i++,$j++){
            array_push($list,[
                'cd_ma'=>$j,
                'cd_ten'=> $types3[$i-1],
                'lv_ma'=>'7'
            ]);           
        } 

        DB::table('chude')->insert($list);
    }
}
