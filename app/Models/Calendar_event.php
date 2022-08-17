<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar_event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'form_id',
        'start',
        'end',
        'title',
        'description',
        'icon',
        'color',
        'created_at',
        'updated_at',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id')->with('form_translate', 'form_category');
    }
}
