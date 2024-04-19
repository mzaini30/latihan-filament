<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataUang extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'mata_uang';
    protected $fillable = [
        'nama'
    ];
}
