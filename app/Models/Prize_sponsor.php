<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'name',
        'description',
        'address',
        'website',
        'facebook',
        'instagram',
        'email',
        'telephone',
        'logo_src',
        'created_at',
        'updated_at',
    ];
}
