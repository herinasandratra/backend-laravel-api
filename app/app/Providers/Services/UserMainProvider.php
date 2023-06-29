<?php 
namespace App\Providers\Services;

use App\Services\Application\UserMain\UserMain;
use App\Services\Application\UserMain\UserMainInterface;
use App\Services\Repository\User\UserRepository;
use App\Services\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserMainProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserMainInterface::class, UserMain::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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

