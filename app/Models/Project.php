<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];


    // public function stats()
    // {
    //     return $this->hasOne(Stat::class);
    // }


    //observer event when creating a new project, increment the projects_count +1
    protected static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            //get table stats
            $stat = Stat::first();
            //increment projects_count +1
            $stat->projects_count++;
            //save
            $stat->save();
        });
    }
}