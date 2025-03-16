<?php

namespace Agrianalytica\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
//        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
