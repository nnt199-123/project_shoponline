<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_pham'; // Thêm dòng này

    protected $fillable = [
        'ten',
        'idnhasx',
        'gia',
        'giakm',
        'hing',
        'ngay',
        'xem',
        'hot',
        'anhien',
        'tinhchat',
        'mausac',
        'cannang'
    ];
}