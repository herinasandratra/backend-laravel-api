<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
    ];
    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'category_articles','category_id','article_id');
    }
}
