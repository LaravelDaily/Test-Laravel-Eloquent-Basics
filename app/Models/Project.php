<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name'];

    public static  function boot()
    {
        parent::boot();
        static::created(function ($a){
            $stat = Stat::query()->first();
            $stat->increment('projects_count');
        });
    }
}
