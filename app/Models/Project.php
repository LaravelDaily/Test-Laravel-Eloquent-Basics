<?php

namespace App\Models;

use App\Providers\App\Events\ProjectEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'created' => ProjectEvent::class,
    ];

    // public static function boot() {
    //     parent::boot();

    //     static::created(function($model) {
    //         Stat::first()->update(['projects_count' => 1]);
    //     });
    // }
}
