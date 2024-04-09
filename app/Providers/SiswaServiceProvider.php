<?php

namespace App\Providers;

use App\Services\Impl\SiswaServiceImpl;
use App\Services\SiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        SiswaService::class => SiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [SiswaService::class];
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
