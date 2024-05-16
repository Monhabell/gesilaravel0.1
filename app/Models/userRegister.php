<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'position',
        'environment',
        'subnet'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function subnet(){
        return $this->belongsTo(Subnets::class);
    }

    // protected $casts = [
    //     'email_verified_at' => 'dateTime'
    // ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}