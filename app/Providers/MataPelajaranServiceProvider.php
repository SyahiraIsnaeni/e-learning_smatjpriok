<?php

namespace App\Providers;

use App\Services\Impl\MataPelajaranServiceImpl;
use App\Services\MataPelajaranService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MataPelajaranServiceProvider extends ServiceProvider implements  DeferrableProvider
{
    public array $singletons = [
        MataPelajaranService::class => MataPelajaranServiceImpl::class
    ];

    public function provides(): array
    {
        return [MataPelajaranService::class];
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
