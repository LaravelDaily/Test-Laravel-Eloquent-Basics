<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterUserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function scopeActive(Builder $builder): void
    {
        $builder->whereNotNul('email_verified_at');
    }

    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
    }
}
