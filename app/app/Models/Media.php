<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'type',
        'path',
        'article_id',
    ];
    public function article()
    {
        return $this->belongsTo(Articles::class);
    }
}
