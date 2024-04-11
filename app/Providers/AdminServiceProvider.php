<?php

namespace App\Providers;

use App\Services\AdminService;
use App\Services\Impl\AdminServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        AdminService::class => AdminServiceImpl::class
    ];

    public function provides(): array
    {
        return [AdminService::class];
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
