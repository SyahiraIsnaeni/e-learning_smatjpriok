<?php

namespace App\Providers;

use App\Services\ForgotPasswordAdminService;
use App\Services\Impl\ForgotPasswordAdminServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ForgotPasswordAdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ForgotPasswordAdminService::class => ForgotPasswordAdminServiceImpl::class
    ];

    public function provides(): array
    {
        return [ForgotPasswordAdminService::class];
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
