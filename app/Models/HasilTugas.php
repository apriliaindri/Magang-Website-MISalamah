<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTugas extends Model
{
    protected $table = 'hasil_tugas';

protected $fillable = [
    'user_id',
    'nama',
    'kelas_id',
    'mapel',
    'judul_tugas',
    'score',
];
}
