<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'kategori';
    protected $fillable = [
        'nama',
        'parent',
        'visibility'
    ];
}
