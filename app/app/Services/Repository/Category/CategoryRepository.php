<?php

namespace App\Services\Repository\Category;

use App\Models\Categories;
use App\Services\Repository\Category\CategoryRepositoryInterface;
class CategoryRepository implements CategoryRepositoryInterface
{    
    /**
     * list
     *
     * @return mixed
     */
    public function list()
    {
        return Categories::select('id', 'name', 'slug')->get();
    }
}