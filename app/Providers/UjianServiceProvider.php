<?php

namespace App\Providers;

use App\Services\Impl\UjianServiceImpl;
use App\Services\UjianService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UjianServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UjianService::class => UjianServiceImpl::class
    ];

    public function provides(): array
    {
        return [UjianService::class];
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
