<?php

namespace App\Services\Application\SourceApplication;

use App\Services\Repository\SourceRepos\SourcesRepositoryInterface;

class  SourceService implements SourceServiceInterface
{
    private $sourcesRepository;
    public function __construct(SourcesRepositoryInterface $sourcesRepository)
    {
        $this->sourcesRepository = $sourcesRepository;
    }
    public function list()
    {
        return $this->sourcesRepository->list();
    }
}