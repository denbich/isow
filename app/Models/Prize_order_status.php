<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_order_status extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
        'condition',
        'info',
        'created_at',
        'updated_at',
    ];
}
