<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function boot()
{
    parent::boot();

    self::creating(function ($model) {
        Stat::all()->each(function ($stat) {
            return $stat->update([
                'projects_count'    => $stat->projects_count + 1
            ]);
        });
    });
}
}
