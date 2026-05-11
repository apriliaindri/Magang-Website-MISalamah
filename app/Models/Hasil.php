<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil_tugas';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'score'
    ];
}
