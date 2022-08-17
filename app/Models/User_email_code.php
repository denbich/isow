<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_email_code extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'code',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
