<?php

namespace App\Services\Application\Articles;

use App\Services\Repository\Articles\ArticleRepositoryInterface;

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
        return $this->articleRepository->list($params);
    }
    
}
