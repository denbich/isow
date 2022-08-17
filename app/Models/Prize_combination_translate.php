<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_combination_translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'combination_id',
        'locale',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

    public function combination()
    {
        return $this->hasOne(Prize_combination::class);
    }
}
