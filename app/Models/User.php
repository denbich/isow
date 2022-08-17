<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'ivid',
        'name',
        'email',
        'password',
        'role',
        'firstname',
        'lastname',
        'gender',
        'photo_src',
        'telephone',
        'agreement_src',
        'agreement_date',
        'language',
        'condition',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function message()
    {
        return $this->hasMany(Message::class, 'sender', 'id');
    }

    public function volunteer()
    {
        return $this->hasOne(Volunteer::class);
    }

    public function author_form()
    {
        return $this->hasOne(Form::class);
    }

    public function signed_form()
    {
        return $this->hasMany(Form_translate::class);
    }

    public function prize_order()
    {
        return $this->belongsTo(Prize_order::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function settings()
    {
        return $this->hasOne(User_setting::class);
    }

    public function points_history()
    {
        return $this->hasMany(Volunteer_history_point::class, 'volunteer_id', 'id');
    }
}
