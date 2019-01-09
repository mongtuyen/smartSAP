<?php

use Illuminate\Database\Seeder;
use App\Nhanvien;
class NhanvienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nhanvien::create([
            'nv_ma'=>'5',
            'nv_taiKhoan'=>'test',
            'nv_matKhau'=>'sss',
            'nv_hoten'=>'Tuyen',
            'nv_gioiTinh'=>'2',
            'nv_email'=>'tuyen@gmail.com',
            'nv_ngaySinh'=>'2017-1-1',
            'nv_diaChi'=>'djn',
            'nv_dienThoai'=>'34343',
            'vt_ma'=>'1'

        ]);
    }
}
