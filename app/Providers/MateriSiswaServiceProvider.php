<?php

namespace App\Providers;

use App\Services\Impl\MateriSiswaServiceImpl;
use App\Services\MateriSiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MateriSiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MateriSiswaService::class => MateriSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [MateriSiswaService::class];
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
