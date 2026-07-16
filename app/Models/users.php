<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable

{
    protected $fillable = ['name', 'email', 'password', 'role'];
    public function profile(): HasOne
    {
        return $this->hasOne(Profiles::class);
    }
    public function portfolioProjects(): HasMany
    {
        return $this->hasMany(Portfolio_Projects::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Likes::class);
    }
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmarks::class);
    }
}
