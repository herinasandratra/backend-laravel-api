<?php 
namespace App\Providers\Services;

use App\Services\Application\SourceApplication\SourceService;
use App\Services\Application\SourceApplication\SourceServiceInterface;
use App\Services\Repository\SourceRepos\SourcesRepository;
use App\Services\Repository\SourceRepos\SourcesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class SourcesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SourceServiceInterface::class, SourceService::class);
        $this->app->bind(SourcesRepositoryInterface::class, SourcesRepository::class);
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

