<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function prize_category_translate()
    {
        return $this->hasOne(Prize_category_translate::class, 'id', 'id');
    }

    public function prize()
    {
        return $this->hasMany(Prize::class, 'category_id', 'id');
    }
}
