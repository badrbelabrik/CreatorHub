<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
// use App\Models\Bookmarks;
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
    return $this->hasMany(Bookmark::class);
}


// public function like()
// {
//     return $this->hasMany(Like::class);
// }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }


}
