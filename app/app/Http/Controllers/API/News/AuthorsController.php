<?php

namespace App\Http\Controllers\API\News;
use App\Http\Controllers\Controller;
use App\Services\Application\Authors\AuthorServiceInterface;

/**
 * Summary of AuthorsController
 */
class AuthorsController extends Controller
{
    /**
     * Summary of authorsService
     * @var 
     */
    private $authorsService;
    /**
     * Summary of __construct
     * @param \App\Services\Application\Authors\AuthorServiceInterface $authorsService
     */
    public function __construct(AuthorServiceInterface $authorsService)
    {
        $this->authorsService = $authorsService;
    }
    /**
     * Summary of list
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {   
        $authors = $this->authorsService->list();
        return response()->json($authors);
    }
}