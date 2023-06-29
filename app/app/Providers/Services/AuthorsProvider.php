<?php 
namespace App\Providers\Services;

use App\Services\Application\Authors\AuthorService;
use App\Services\Application\Authors\AuthorServiceInterface;
use App\Services\Repository\Authors\AuthorsRepository;
use App\Services\Repository\Authors\AuthorsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AuthorsProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthorServiceInterface::class, AuthorService::class);
        $this->app->bind(AuthorsRepositoryInterface::class, AuthorsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

