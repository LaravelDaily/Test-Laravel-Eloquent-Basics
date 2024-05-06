<?php

namespace App\Models;

/**
 * Somehow Attribute observers are not working
 */
// use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Attributes\ObservedBy;

// #[ObservedBy([ProjectObserver])]
class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];
}
