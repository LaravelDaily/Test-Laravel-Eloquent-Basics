<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];



    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function scopeActive($query)
    {
        return $query->where('email_verified_at', '!=', null);
    }

    //soft delete
    public function scopeTrashed($query)
    {
        return $query->whereNotNull('deleted_at');
    }


    public function scopeNotTrashed($query)
    {
        return $query->whereNull('deleted_at');
    }


    ///when add new project, add 1 to projects_count
    public static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            $stat = Stat::first();
            $stat->projects_count = $stat->projects_count + 1;
            $stat->save();
        });
    }


}