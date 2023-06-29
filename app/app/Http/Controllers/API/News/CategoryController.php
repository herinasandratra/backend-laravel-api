<?php

namespace App\Http\Controllers\API\News;
use App\Http\Controllers\Controller;
use App\Services\Application\Category\CategoryServiceInterface;

/**
 * Summary of CategoryController
 */
class CategoryController extends Controller
{
    /**
     * Summary of categoryService
     * @var 
     */
    private $categoryService;
    /**
     * Summary of __construct
     * @param \App\Services\Application\Category\CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Summary of list
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $categories = $this->categoryService->list();
        return response()->json($categories);
    }
}