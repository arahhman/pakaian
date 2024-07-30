<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pakaian extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'pakaian';

    protected $fillable = [
        'jenis',
        'merk',
    ];

    public $timestamps = false;
}
