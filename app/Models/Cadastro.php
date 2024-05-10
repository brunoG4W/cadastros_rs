<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cadastro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'necessidades' => 'array',
    ];
}
