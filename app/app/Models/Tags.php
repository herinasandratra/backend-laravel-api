<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = [
        'slub',
        'name',
    ];
    public function articles()
    {
        return $this->belongsToMany(Articles::class, 'tag_articles','tag_id','article_id');
    }
}
