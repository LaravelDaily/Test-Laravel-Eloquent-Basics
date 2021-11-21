<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morningnews extends Model
{
    use HasFactory;
    protected $table = 'morning_news';
    public $timestamps = true;
    
    protected $fillable = [
         'title',
         'news_text'
        ];
}
