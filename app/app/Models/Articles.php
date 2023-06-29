<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'source_id',
        'author_id',
        'created_at'
    ];

    public function infos()
    {
        return $this->hasMany(InfoArticles::class,'article_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'tag_articles','article_id','tag_id')->withPivot([]); //by default article_tag
    }
    public function author()
    {
        return $this->belongsTo(Authors::class);
    }
    public function source()
    {
        return $this->belongsTo(Sources::class,'source_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_articles','article_id','category_id')->withPivot([]); //by default article_category
    }
    public function media()
    {
        return $this->hasMany(Media::class,'article_id');
    }
}
