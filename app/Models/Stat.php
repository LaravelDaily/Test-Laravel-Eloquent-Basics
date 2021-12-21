<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = ['users_count', 'projects_count'];
	
	protected static function boot()
    {
        parent::boot();
        static::created(function ($project) {
            $project->projects_count += 1;
            $project->save();
        });
    }
}
