<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'form_id',
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function post_translate()
    {
        return $this->hasOne(Post_translate::class, 'post_id', 'id');
    }

    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id')->with('form_translate');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function sign()
    {
        return $this->hasOne(Form_sign::class, 'form_id', 'form_id');
    }
}
