<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_sign extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'form_id',
        'volunteer_id',
        'position_id',
        'choosen_position_id',
        'feedback',
        'condition',
        'created_at',
        'updated_at',
    ];

    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id')->with('form_translate');
    }

    public function volunteer()
    {
        return $this->hasOne(User::class, 'id', 'volunteer_id')->with('volunteer');
    }

    public function position()
    {
        return $this->hasOne(Form_position::class, 'id', 'position_id')->with('form_position_translate');
    }
}
