<?php

namespace App\Providers;

use App\Services\Impl\TugasServiceImpl;
use App\Services\TugasService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TugasServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        TugasService::class => TugasServiceImpl::class
    ];

    public function provides(): array
    {
        return [TugasService::class];
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
