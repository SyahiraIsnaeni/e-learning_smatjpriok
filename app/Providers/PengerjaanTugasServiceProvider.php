<?php

namespace App\Providers;

use App\Services\Impl\PengerjaanTugasServiceImpl;
use App\Services\PengerjaanTugasService;
use App\Services\TugasService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PengerjaanTugasServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PengerjaanTugasService::class => PengerjaanTugasServiceImpl::class
    ];

    public function provides(): array
    {
        return [PengerjaanTugasService::class];
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
