<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted()
    {
        parent::boot();
        static::creating(function () {
            $stat = Stat::first();
            $stat->update(['projects_count' => $stat->projects_count + 1]);
        });

    }
}
