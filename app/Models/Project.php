<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected static function booted()
    {
        static::creating(function ($user) {
            $project_count = Stat::first()->value('projects_count');
            Stat::find(1)->update(['projects_count' => $project_count+1]);
        });
    }

}
