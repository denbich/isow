<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'volunteer_id',
        'prize_id',
        'combination_id',
        'info',
        'prize_points',
        'volunteer_points',
        'created_at',
        'updated_at',
    ];

    public function volunteer()
    {
        return $this->hasOne(User::class, 'id', 'volunteer_id')->with('volunteer', 'points_history');
    }

    public function prize()
    {
        return $this->hasOne(Prize::class, 'id', 'prize_id')->with('prize_translate', 'category');
    }

    public function combination()
    {
        return $this->hasOne(Prize_combination::class, 'id', 'combination_id')->with('translate');
    }

    public function status()
    {
        return $this->hasMany(Prize_order_status::class, 'order_id', 'id');
    }
}
