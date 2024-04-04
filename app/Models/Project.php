<?php

namespace App\Models;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function booted() {
        static::created(function (Project $project) {
            $stat = Stat::first();
            $stat->projects_count += 1;
            $stat->save();
        });
    }
}
