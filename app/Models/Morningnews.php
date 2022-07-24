<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MorningNews extends Model
{
    use HasFactory;

    protected $table= 'morning_news';
    protected $fillable = ['title', 'news_text'];
}
