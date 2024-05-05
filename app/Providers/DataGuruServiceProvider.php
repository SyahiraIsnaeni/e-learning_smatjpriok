<?php

namespace App\Providers;

use App\Services\DataGuruService;
use App\Services\Impl\DataGuruServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DataGuruServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        DataGuruService::class => DataGuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [DataGuruService::class];
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
