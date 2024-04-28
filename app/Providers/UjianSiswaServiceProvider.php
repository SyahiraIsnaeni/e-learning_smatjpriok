<?php

namespace App\Providers;

use App\Services\Impl\UjianSiswaServiceImpl;
use App\Services\UjianSiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UjianSiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UjianSiswaService::class => UjianSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [UjianSiswaService::class];
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
