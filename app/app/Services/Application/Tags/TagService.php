<?php

namespace App\Services\Application\Tags;

use App\Services\Repository\Tags\TagsRepositoryInterface;

class TagService implements TagServiceInterface
{    
    private $tagRepository;
    public function __construct(TagsRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    /**
     * list
     *
     * @return mixed
     */
    public function list()
    {
        return $this->tagRepository->list();
    }
}