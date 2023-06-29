<?php
namespace App\Services\Repository\Articles;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{    
    /**
     * list
     *
     * @param  array $params
     * @return LengthAwarePaginator
     */
    public function list(array $params) :LengthAwarePaginator;
}