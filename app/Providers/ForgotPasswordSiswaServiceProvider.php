<?php

namespace App\Providers;

use App\Services\ForgotPasswordAdminService;
use App\Services\ForgotPasswordSiswaService;
use App\Services\Impl\ForgotPasswordSiswaServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ForgotPasswordSiswaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ForgotPasswordSiswaService::class => ForgotPasswordSiswaServiceImpl::class
    ];

    public function provides(): array
    {
        return [ForgotPasswordSiswaService::class];
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
