<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'icon',
        'color',
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function form_category_translate()
    {
        return $this->hasOne(Form_category_translate::class, 'id', 'id');
    }

    public function form()
    {
        return $this->hasMany(Form::class, 'category_id', 'id')->with('form_translate');
    }
}
