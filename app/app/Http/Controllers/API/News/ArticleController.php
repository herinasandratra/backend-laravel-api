<?php

namespace App\Http\Controllers\API\News;
use App\Http\Controllers\Controller;
use App\Services\Application\Articles\ArticleServiceInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleService;
    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }
    public function list(Request $request)
    {
        $params = $request->all();
        $articles = $this->articleService->list($params);
        return response()->json($articles);
    }
}