<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function portfolioProjects()
{
    return $this->hasMany(PortfolioProject::class);
}

public function bookmarks()
{
    return $this->hasMany(Bookmarks::class);
}


public function likes()
{
    return $this->hasMany(likes::class);
}




}
