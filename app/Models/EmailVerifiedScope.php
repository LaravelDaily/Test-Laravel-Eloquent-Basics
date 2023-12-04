<?php
 
namespace App\Models\Scopes;
 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
 
class EmailVerifiedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function scopeActive(Builder $builder): void
    {
        $builder->whereNotNull('email_verified_at');
    }
}
