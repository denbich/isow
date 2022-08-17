<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'expiration',
        'place_longitude',
        'place_latitude',
        'icon_src',
        'author_id',
        'category_id',
        'condition',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form_translate()
    {
        return $this->hasOne(Form_translate::class);
    }

    public function form_category()
    {
        return $this->hasOne(Form_category::class, 'id', 'category_id')->with('form_category_translate');
    }

    public function form_positions()
    {
        return $this->hasMany(Form_position::class, 'form_id', 'id')->with('form_position_translate');
    }

    public function signed_form()
    {
        return $this->belongsTo(Form_sign::class, 'id', 'form_id');
    }

    public function calendar()
    {
        return $this->hasOne(Calendar_event::class);
    }

    public function signedform()
    {
        return $this->hasMany(Form_sign::class, 'form_id', 'id');
    }

    public function signervolunteer()
    {
        return $this->hasOne(Form_sign::class, 'volunteer_id', Auth::id());
    }
}
