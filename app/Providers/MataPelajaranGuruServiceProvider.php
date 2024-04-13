<?php

namespace App\Providers;

use App\Services\Impl\MataPelajaranGuruServiceImpl;
use App\Services\MataPelajaranGuruService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MataPelajaranGuruServiceProvider extends ServiceProvider implements  DeferrableProvider
{
    public array $singletons = [
        MataPelajaranGuruService::class => MataPelajaranGuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [MataPelajaranGuruService::class];
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
