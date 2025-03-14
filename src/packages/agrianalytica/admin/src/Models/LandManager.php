<?php

namespace Agrianalytica\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandManager extends Model
{
    use HasFactory;

    protected $table = 'land_managers';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'land_manager_roles', 'land_manager_uuid', 'role_id');
    }
}
