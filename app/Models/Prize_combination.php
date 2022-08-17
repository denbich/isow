<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_combination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'quantity',
        'prize_id',
        'created_at',
        'updated_at',
    ];

    public function translate()
    {
        return $this->hasOne(Prize_combination_translate::class, 'combination_id', 'id');
    }

    public function orders()
    {
        return $this->HasMany(Prize_order::class, 'combination_id', 'id');
    }
}
