<?php

namespace App\Models;

use App\Events\ProjectCreating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',

    ];
    protected static function booted()
    {
        static::creating(function ($project) {
            //
            $stat =Stat::first();
            $stat->projects_count = $stat->projects_count+1;
            $stat->save();
        });
    }
}
