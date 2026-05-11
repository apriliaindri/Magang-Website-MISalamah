<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
protected $fillable = [
    'title',
    'content',
    'image',
    'category',
    'sub_category', // ⬅️ tambahkan ini
    'user_id'
];
}
