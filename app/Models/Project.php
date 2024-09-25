<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\ProjectObserver;

#[ObservedBy([ProjectObserver::class])]
class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
}
