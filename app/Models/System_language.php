<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System_language extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'language',
        'polish',
        'english',
        'ukrainian',
        'native',
    ];
}
