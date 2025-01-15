<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'nama', 'nim', 'email', 'jurusan', 'created_at', 'updated_at'];

}
