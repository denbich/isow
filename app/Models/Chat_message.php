<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ivid',
        'sender',
        'receiver',
        'title',
        'content',
        'condition',
        'created_at',
    ];

    public function getsusername()
    {
        return User::where('id', $this->sender)->first();
    }

    public function getsender()
    {
        return $this->belongsTo('App\Models\User', 'id'); //User::class
    }

    public function getreceiver()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
