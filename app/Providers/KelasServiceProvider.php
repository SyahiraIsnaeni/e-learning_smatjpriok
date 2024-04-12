<?php

namespace App\Providers;

use App\Services\Impl\KelasServiceImpl;
use App\Services\KelasService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class KelasServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        KelasService::class => KelasServiceImpl::class
    ];

    public function provides(): array
    {
        return [KelasService::class];
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
