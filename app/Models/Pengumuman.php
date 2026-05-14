<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use SoftDeletes;

    protected $table = 'pengumuman';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'judul',
        'isi',
        'file',
        'gambar',
    ];

    // Cast gambar sebagai array
    protected $casts = [
        'gambar' => 'array',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
