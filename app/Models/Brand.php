<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'brand';
    protected $fillable = [
        'nama',
        'website',
        'visibility'
    ];
}
