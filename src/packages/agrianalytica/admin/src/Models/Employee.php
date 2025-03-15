<?php

namespace Agrianalytica\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['id', 'name', 'email', 'password', 'role_id'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['id' => 'string', 'password' => 'hashed'];

    // Генерируем UUID при создании
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($employee) {
            $employee->id = (string) Str::uuid();
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Методы JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
