<?php

namespace App\Providers;

use App\Services\Impl\MateriServiceImpl;
use App\Services\MateriService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MateriServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        MateriService::class => MateriServiceImpl::class
    ];

    public function provides(): array
    {
        return [MateriService::class];
    }

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
