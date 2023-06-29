<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
    ];
    public function article()
    {
        return $this->hasOne(Articles::class);
    }
}
