<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Bookmark extends Model
{
    protected $fillable =
    [
    'user_id',
    'portfolio_project_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function portfolioProject()
    {
        return $this->belongsTo(PortfolioProject::class);
    }
}
