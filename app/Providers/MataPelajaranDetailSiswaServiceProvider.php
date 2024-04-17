<?php

namespace App\Providers;

use App\Services\Impl\MataPelajaranDetailSiswaServiceImpl;
use App\Services\MataPelajaranDetailSiswaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MataPelajaranDetailSiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MataPelajaranDetailSiswaService::class => MataPelajaranDetailSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [MataPelajaranDetailSiswaService::class];
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
