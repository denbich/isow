<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloud_folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'isinroot',
        'folder_id',
        'name',
        'description',
        'color',
        'root',
        'user_id',
        'condition',
        'created_at',
        'updated_at',
    ];
}
