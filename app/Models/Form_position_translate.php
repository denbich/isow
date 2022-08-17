<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_position_translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'position_id',
        'locale',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

    public function form_position()
    {
        return $this->belongsTo(Form_position::class, 'position_id', 'id');
    }
}
