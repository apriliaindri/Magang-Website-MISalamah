<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [

        'kelas_id',
        'judul',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban_benar',
        'score',
        'published'

    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
