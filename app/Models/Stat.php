<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Stat
 *
 * @property int $id
 * @property int $users_count
 * @property int $projects_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Stat newModelQuery()
 * @method static Builder|Stat newQuery()
 * @method static Builder|Stat query()
 * @method static Builder|Stat whereCreatedAt($value)
 * @method static Builder|Stat whereId($value)
 * @method static Builder|Stat whereProjectsCount($value)
 * @method static Builder|Stat whereUpdatedAt($value)
 * @method static Builder|Stat whereUsersCount($value)
 * @mixin Eloquent
 */
class Stat extends Model
{
    use HasFactory;

    protected $fillable = ['users_count', 'projects_count'];
}
