<?php

namespace App\Services\Application\Articles;

use App\Services\Object\Articles\FilterArticles;
use App\Services\Repository\Articles\ArticleRepositoryInterface;
use Carbon\Carbon;

/**
 * Summary of ArticleService
 */
class ArticleService  implements ArticleServiceInterface
{
    private $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }  
    /**
     * list
     *
     * @param  array $params
     * @return mixed
     */
    public function list(array $params)
    {
        $language = $params['params']['language'] ?? '';
        $source_id = $params['params']['source_id'] ?? 0;
        $author_id = $params['params']['author_id'] ?? 0;
        $category_id = $params['params']['category_id'] ?? 0;
        $tag_id = $params['params']['tag_id'] ?? 0;
        $description = $params['params']['description'] ?? '';
        $start_date = $params['params']['start_date'] ? Carbon::parse($params['params']['start_date'])->startOfDay():  '';
        $end_date = $params['params']['end_date'] ? Carbon::parse($params['params']['end_date'])->startOfDay():  '';
        
        $filter = new FilterArticles(
            $language,
            $author_id,
            $category_id,
            $description,
            $source_id,
            $tag_id,
            $start_date,
            $end_date
        );
        return $this->articleRepository->list($filter);
    }
    
}
