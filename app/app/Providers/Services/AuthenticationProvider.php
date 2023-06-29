<?php 
namespace App\Providers\Services;

use App\Services\Application\Authentication\Authentication;
use App\Services\Application\Authentication\AuthenticationInterface;
use Illuminate\Support\ServiceProvider;

class AuthenticationProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthenticationInterface::class, Authentication::class);
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

