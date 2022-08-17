<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_category_translate extends Model
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
        return $this->hasOne(Form_ategory::class);
    }
}
