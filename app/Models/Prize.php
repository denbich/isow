<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'quantity',
        'points',
        'with_combinations',
        'icon',
        'color',
        'sponsor_id',
        'category_id',
        'author_id',
        'icon_src',
        'created_at',
        'updated_at',
    ];

    public function prize_translate()
    {
        return $this->hasOne(Prize_translate::class);
    }

    public function prize_order()
    {
        return $this->belongsTo(Prize_order::class);
    }

    public function sponsor()
    {
        return $this->hasOne(Prize_sponsor::class, 'id', 'sponsor_id');
    }

    public function category()
    {
        return $this->hasOne(Prize_category::class, 'id', 'category_id')->with('prize_category_translate');
    }

    public function combinations()
    {
        return $this->hasMany(Prize_combination::class, 'prize_id', 'id')->with(['translate', 'orders']);//;
    }

    public function orders()
    {
        return $this->hasMany(Prize_order::class, 'prize_id', 'id')->with(['volunteer', 'combination']);
    }
}
