<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'user_id',
        'points',
        'telephone',
        'birth',
        'tshirt_size',
        'pesel',
        'street',
        'house_number',
        'city',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signed_form()
    {
        return $this->belongsTo(User::class);
    }
}
