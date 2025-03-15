<?php

namespace Agrianalytica\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class LandManager extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'land_managers';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'role_id',
    ];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
