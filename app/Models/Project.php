<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project onlyTrashed()
 * @method static Builder|Project query()
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDeletedAt($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereName($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @method static Builder|Project withTrashed()
 * @method static Builder|Project withoutTrashed()
 * @mixin Eloquent
 */
class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
}
