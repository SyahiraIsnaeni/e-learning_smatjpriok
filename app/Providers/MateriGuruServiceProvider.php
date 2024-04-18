<?php

namespace App\Providers;

use App\Services\Impl\MateriGuruServiceImpl;
use App\Services\MateriGuruService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MateriGuruServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        MateriGuruService::class => MateriGuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [MateriGuruService::class];
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
