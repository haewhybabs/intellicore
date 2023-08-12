<?php

namespace App\Providers;

use App\Repositories\CodeRepository;
use App\Repositories\CodeRepositoryInterface;
use App\Services\CodeService;
use App\Services\CodeServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CodeRepositoryInterface::class, CodeRepository::class);
        $this->app->bind(CodeServiceInterface::class, CodeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
