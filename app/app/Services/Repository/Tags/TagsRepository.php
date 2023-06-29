<?php

namespace App\Services\Repository\Tags;
use App\Models\Tags;
class TagsRepository implements TagsRepositoryInterface
{    
    /**
     * list
     *
     * @return mixed
     */
    public function list()
    {
        return Tags::select('id', 'name', 'slug')->get();
    }
}