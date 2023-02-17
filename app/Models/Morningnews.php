<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\MorningNews
 *
 * @property int $id
 * @property string $title
 * @property string $news_text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|MorningNews newModelQuery()
 * @method static Builder|MorningNews newQuery()
 * @method static Builder|MorningNews query()
 * @method static Builder|MorningNews whereCreatedAt($value)
 * @method static Builder|MorningNews whereId($value)
 * @method static Builder|MorningNews whereNewsText($value)
 * @method static Builder|MorningNews whereTitle($value)
 * @method static Builder|MorningNews whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MorningNews extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'news_text'];
}
