<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Morningnews extends Model
{
    use HasFactory;

    protected $table = 'morning_news';
    protected $fillable = [
        'title',
        'news_text'
    ];
}
