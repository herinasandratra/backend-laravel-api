<?php 
namespace App\Providers\Services;

use App\Services\Application\Articles\ArticleService;
use App\Services\Application\Articles\ArticleServiceInterface;
use App\Services\Repository\Articles\ArticleRepository;
use App\Services\Repository\Articles\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ArticleProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
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

