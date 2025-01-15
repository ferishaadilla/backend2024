<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //Menentukan kolom-kolom dalam tabel news yang diizinkan untuk diisi ketika objek News dibuat atau diperbarui
    protected $fillable = ['title', 'author', 'description', 'content', 'url', 'url_image', 'published_at', 'category', 'created_at', 'updated_at'];
}
