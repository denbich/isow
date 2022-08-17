<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'google_auth',
        'google_auth_id',
        'google_auth_email',
        'facebook_auth',
        'facebook_auth_id',
        'facebook_auth_email',
        'google2fa',
        'google2fa_code',
        'email2fa',
        'messages_email',
        'messages_push',
        'notifications_email',
        'notifications_push',
        'marketing_email',
        'marketing_push',
        'login_email',
        'login_push',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
