<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'kelas_id');
    }
}
