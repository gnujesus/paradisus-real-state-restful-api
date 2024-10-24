<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\Services\AmenityService;
use App\Application\Services\PropertyService;
use App\Application\Interfaces\IAmenityService;
use App\Application\Interfaces\IPropertyService;
use App\Application\Interfaces\IAmenityRepository;
use App\Application\Interfaces\IPropertyRepository;
use App\Infrastructure\Repositories\AmenityRepository;
use App\Infrastructure\Repositories\PropertyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $interfaceService = [
            IAmenityService::class => AmenityService::class,
            IPropertyService::class => PropertyService::class,
            IPropertyRepository::class => PropertyRepository::class,
            IAmenityRepository::class => AmenityRepository::class,
        ];

        foreach ($interfaceService as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
