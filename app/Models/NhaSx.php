<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSx extends Model
{
    use HasFactory;
    protected $table = 'nha_sx'; // Thêm dòng này

    protected $fillable = [
        'ten',
        'thutu',
        'anhien'
    ];
}
