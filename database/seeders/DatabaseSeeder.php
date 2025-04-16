<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    { 
        DB::table('tinh_chat')->insert([
            ['id'=>1,'ten'=>'Bình thường'],
            ['id'=>2,'ten'=>'Giá rẻ'],
            ['id'=>3,'ten'=>'Giá sốc'],
            ['id'=>4,'ten'=>'Cao cấp'],
        ]);
        DB::table('nha_sx')->insert([
            ['id'=>1,'ten'=>'Asus','thutu'=>1,'anhien'=>1],
            ['id'=>2,'ten'=>'Acer','thutu'=>2,'anhien'=>1],
            ['id'=>3,'ten'=>'Lenovo','thutu'=>4,'anhien'=>1],
            ['id'=>4,'ten'=>'MSI','thutu'=>5,'anhien'=>1],
            ['id'=>5,'ten'=>'HP','thutu'=>3,'anhien'=>1],
            ['id'=>6,'ten'=>'Dell','thutu'=>8,'anhien'=>1],
            ['id'=>7,'ten'=>'Apple','thutu'=>9,'anhien'=>1],
            ['id'=>8,'ten'=>'Surface','thutu'=>10,'anhien'=>1],
            ['id'=>9,'ten'=>'Masstel','thutu'=>7,'anhien'=>0],
            ['id'=>10,'ten'=>'LG','thutu'=>6,'anhien'=>1],
        ]);
        $hinh_arr = [
            'product-1.jpg',
            'product-2.jpg',
            'product-3.jpg',
            'product-4.jpg',
            'product-5.jpg',
            'product-6.jpg',
            'product-7.jpg',
            'product-8.jpg',
            'product-9.jpg',
            'cat-1.jpg',
            'cat-2.jpg',
            'cat-3.jpg',
            'cat-4.jpg'


        ];
        $mau_sac = [
            'cam',
            'vang',
            'den',
            'trang'
        ];
        $can_nang = [
            '1 kg',
            '2 kg',
            '3 kg',
        ];
        $tensp=[
            'Asus',
            'Iphone',
            'G12',
            'Lenovo',
            'Mx97',
            'Đầm phụ nữ',
            'Camera',
            'Nước hoa nam',
            'Nước hoa nữ',
            'Apple',
            'Banana',
            'Vàng',
            'Bạc',
            'Kim cương'
        ];
        for($i=0; $i<1000; $i++ ){
            DB::table('san_pham')->insert([
                'idnhasx' => mt_rand(1,10),
                'ten' => Arr::random($tensp),
                'gia' => mt_rand(20000000, 30000000),
                'giakm' => mt_rand(10000000, 15000000),
                'hing' => Arr::random($hinh_arr),
                'mausac' => Arr::random($mau_sac),
                'cannang' => Arr::random($can_nang),
                'xem' => mt_rand(0,2000),
                'hot' => mt_rand(0,1),
                'anhien' => mt_rand(0,1),
                'tinhchat'=>mt_rand(0,4)
            ]);

        }
        DB::table('users')->insert([
            [ 'name' => 'Đỗ Đạt Cao', 'password' => bcrypt('hehe') , 'dia_chi'=>'',
                'email' => 'dodatcao@gmail.com','dien_thoai' => '0918765238',
                'hinh' => '','role' => 1 ], 
            [ 'name' => 'Mai Anh Tới', 'password' => bcrypt('hehe') ,'dia_chi'=>'',
                'email' => 'maianhtoi@gmail.com','dien_thoai' => '098532482',
                'hinh' => '','role' => 0 ],
            [ 'name' => 'Đào Kho Báu', 'password' => bcrypt('hehe') ,'dia_chi'=>'',
                'email' => 'daokhobau@gmail.com','dien_thoai' => '097397392',
                'hinh' => '','role' => 1]
            ]);
           
    }
}

