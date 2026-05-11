<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalPg extends Model
{
    protected $table = 'soal_pg';

    protected $fillable = [
        'kelas_id',
        'tugas_id',
        'judul',
        'mapel',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban_benar',
        'nilai',
        'status'
    ];
}
