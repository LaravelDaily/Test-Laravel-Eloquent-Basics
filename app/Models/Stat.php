<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = ['users_count', 'projects_count'];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function scopeActive($query)
    {
        return $query->where('email_verified_at', '!=', null);
    }

    
}
