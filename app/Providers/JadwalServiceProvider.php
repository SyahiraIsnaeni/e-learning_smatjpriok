<?php

namespace App\Providers;

use App\Services\Impl\JadwalServiceImpl;
use App\Services\JadwalService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class JadwalServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        JadwalService::class => JadwalServiceImpl::class
    ];

    public function provides(): array
    {
        return [JadwalService::class];
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
