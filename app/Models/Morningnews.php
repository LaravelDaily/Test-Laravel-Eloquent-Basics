<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MorningNews
 *
 * @property int $id
 * @property string $title
 * @property string $news_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews query()
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews whereNewsText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MorningNews whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MorningNews extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'news_text'];
}
