<?php

namespace App\Providers;

use App\Services\Impl\MataPelajaranSiswaServiceImpl;
use App\Services\MataPelajaranSiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MataPelajaranSiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MataPelajaranSiswaService::class => MataPelajaranSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [MataPelajaranSiswaService::class];
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
