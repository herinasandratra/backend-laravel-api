<?php 
namespace App\Providers\Services;

use App\Services\Application\Category\CategoryService;
use App\Services\Application\Category\CategoryServiceInterface;
use App\Services\Application\Tags\TagService;
use App\Services\Application\Tags\TagServiceInterface;
use App\Services\Repository\Category\CategoryRepository;
use App\Services\Repository\Category\CategoryRepositoryInterface;
use App\Services\Repository\Tags\TagsRepository;
use App\Services\Repository\Tags\TagsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TagsProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagServiceInterface::class, TagService::class);
        $this->app->bind(TagsRepositoryInterface::class, TagsRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
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

