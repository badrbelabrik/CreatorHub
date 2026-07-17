<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'link',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}