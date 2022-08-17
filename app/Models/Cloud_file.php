<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloud_file extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'folder_id',
        'name',
        'extention',
        'mimetype',
        'root',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
