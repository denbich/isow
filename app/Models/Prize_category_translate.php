<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_category_translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'locale',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Prize_category::class, 'category_id', 'id');
    }
}
