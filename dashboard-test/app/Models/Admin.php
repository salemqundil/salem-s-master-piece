<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_superadmin',
    ];

    /**
     * Hide sensitive fields when the model is serialized.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
