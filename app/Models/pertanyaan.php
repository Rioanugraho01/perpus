<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'soal';
    protected $fillable = [
        'id_soal',
        'pertanyaan'
    ];


}
