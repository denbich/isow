<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'prize_id',
        'locale',
        'title',
        'description',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }
}
