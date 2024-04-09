<?php

namespace App\Providers;

use App\Services\GuruService;
use App\Services\Impl\GuruServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class GuruServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        GuruService::class => GuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [GuruService::class];
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
