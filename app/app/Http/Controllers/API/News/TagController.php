<?php

namespace App\Http\Controllers\API\News;
use App\Http\Controllers\Controller;
use App\Services\Application\Tags\TagServiceInterface;

/**
 * Summary of TagController
 */
class TagController extends Controller
{
    /**
     * Summary of tagService
     * @var 
     */
    private $tagService;
    /**
     * Summary of __construct
     * @param \App\Services\Application\Tags\TagServiceInterface $tagService
     */
    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }
    /**
     * Summary of list
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $tags = $this->tagService->list();
        return response()->json($tags);
    }
    
}