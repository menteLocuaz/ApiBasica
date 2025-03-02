<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelstudent extends Model
{
    use HasFactory;

    protected $table =   'studen';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'Curso'

    ];
}
