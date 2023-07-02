<?php
namespace App\Services\Repository\Articles;

use App\Services\Object\Articles\FilterArticles;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{    
    /**
     * list
     *
     * @param  FilterArticles $params
     * @return LengthAwarePaginator
     */
    public function list(FilterArticles $params) :LengthAwarePaginator;
}