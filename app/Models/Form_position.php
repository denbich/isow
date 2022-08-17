<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_position extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'form_id',
        'points',
        'max_volunteer',
        'start',
        'end',
        'created_at',
        'updated_at',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function form_position_translate()
    {
        return $this->hasOne(Form_position_translate::class, 'position_id', 'id');
    }

    public function signed_form()
    {
        return $this->belongsTo(Form_sign::class, 'id', 'position_id')->with('volunteer');
    }

    public function signed()
    {
        return $this->hasMany(Form_sign::class, 'position_id', 'id')->with('volunteer');
    }
}
