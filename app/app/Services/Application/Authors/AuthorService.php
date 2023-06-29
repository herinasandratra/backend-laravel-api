<?php
namespace App\Services\Application\Authors;
use App\Services\Application\Authors\AuthorServiceInterface;
use App\Services\Repository\Authors\AuthorsRepositoryInterface;
class AuthorService implements AuthorServiceInterface
{
    private $authorsRepository;
    public function __construct(AuthorsRepositoryInterface $authorsRepository)
    {
        $this->authorsRepository = $authorsRepository;
    }
    public function list()
    {
        return $this->authorsRepository->list();
    }
}