<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBrand extends Model
{
    use HasFactory;

    protected $table = 'toko_brand';

    protected $fillable = [
        'nama'
    ];
}
