<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer_language extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'language1',
        'language2',
        'language3',
        'language4',
        'language5',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
