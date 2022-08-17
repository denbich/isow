<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer_history_point extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'volunteer_id',
        'reason',
        'form_id',
        'prize_id',
        'coordinator_id',
        'points',
        'info',
        'created_at',
        'updated_at',
    ];
}
