<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'pengunjung';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'latitude',
        'longitude',
        'email',
        'prodi',
        'status',
        'keperluan',
        'time'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
