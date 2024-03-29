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
        static::creating(function ($project) {
            $stats = Stat::firstOrNew([]);
            $stats->projects_count += 1;
            $stats->save();
        });
    }
}
