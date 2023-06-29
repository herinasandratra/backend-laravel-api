<?php

namespace App\Http\Controllers\API\News;
use App\Http\Controllers\Controller;
use App\Services\Application\SourceApplication\SourceServiceInterface;

/**
 * Summary of SourcesController
 */
class SourcesController extends Controller
{
    /**
     * Summary of sourceService
     * @var 
     */
    private $sourceService;
    /**
     * Summary of __construct
     * @param \App\Services\Application\SourceApplication\SourceServiceInterface $sourceService
     */
    public function __construct(SourceServiceInterface $sourceService)
    {
        $this->sourceService = $sourceService;
    }
    /**
     * Summary of list
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {   
        $sources = $this->sourceService->list();
        return response()->json($sources);
    }
}