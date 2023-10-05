<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Stat extends Model
{
    use HasFactory;

    protected $fillable = ['users_count', 'projects_count'];

    protected $table = 'stats';

}
