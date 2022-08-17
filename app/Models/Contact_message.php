<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'name',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];
}
