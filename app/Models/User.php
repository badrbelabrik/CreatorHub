<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Les workspaces créés par l'utilisateur.
     */
    public function workspaces()
    {
        return $this->hasMany(Workspace::class, 'owner_id');
    }

    /**
     * Les tâches assignées à l'utilisateur.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
}