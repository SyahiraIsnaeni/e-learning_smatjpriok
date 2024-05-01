<?php

namespace App\Providers;

use App\Services\ForgotPasswordGuruService;
use App\Services\Impl\ForgotPasswordGuruServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ForgotPasswordGuruServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ForgotPasswordGuruService::class => ForgotPasswordGuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [ForgotPasswordGuruService::class];
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
