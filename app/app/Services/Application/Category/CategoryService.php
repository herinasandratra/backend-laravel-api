<?php

namespace App\Services\Application\Category;

use App\Services\Application\Category\CategoryServiceInterface;
use App\Services\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{    
    private $catRepository;
    public function __construct(CategoryRepositoryInterface $catRepository)
    {
        $this->catRepository = $catRepository;
    }
    /**
     * list
     *
     * @return mixed
     */
    public function list()
    {
        return $this->catRepository->list();
    }
}