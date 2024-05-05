<?php

namespace App\Providers;

use App\Services\DataSiswaService;
use App\Services\Impl\DataSiswaServiceImpl;
use Illuminate\Support\ServiceProvider;

class DataSiswaServiceProvider extends ServiceProvider
{
    public array $singletons = [
        DataSiswaService::class => DataSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [DataSiswaService::class];
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
