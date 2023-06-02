<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Project $project) {
            $stat = Stat::first();

            $stat->update([
                    'projects_count' => ++$stat->projects_count
                ]);
        });
    }
}
