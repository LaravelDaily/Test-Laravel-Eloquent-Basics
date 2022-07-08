<?php

namespace App\Models;

use App\Events\ProjectCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'created' => ProjectCreated::class,
    ];
}
