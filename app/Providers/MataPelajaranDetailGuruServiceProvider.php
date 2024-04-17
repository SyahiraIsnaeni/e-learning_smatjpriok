<?php

namespace App\Providers;

use App\Services\Impl\MataPelajaranDetailGuruServiceImpl;
use App\Services\MataPelajaranDetailGuruService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MataPelajaranDetailGuruServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MataPelajaranDetailGuruService::class => MataPelajaranDetailGuruServiceImpl::class
    ];

    public function provides(): array
    {
        return [MataPelajaranDetailGuruService::class];
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
