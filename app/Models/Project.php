<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Laravel\Sanctum\HasApiTokens;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
	 protected $guarded = [];
    protected $fillable = [
        'name',
        
    ];
	
	protected $hidden = [
        'remember_token',
    ];

	protected static function boot()
    {
        parent::boot();
    }
}
