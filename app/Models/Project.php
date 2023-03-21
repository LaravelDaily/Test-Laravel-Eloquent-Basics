<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
"name"
    ];
    public static function updateData($query, $data)
{
    self::where(['name' => $query])->update([
        "name" => $data
    ]);
}

}
