<?php

namespace App\Providers;

use App\Http\Resources\Api\V1\AmenityResource;
use App\Services\AmenityService;
use App\Services\PropertyService;
use App\Interfaces\IAmenityService;
use App\Interfaces\IPropertyService;
use App\Interfaces\IAmenityRepository;
use App\Interfaces\IPropertyRepository;
use App\Repositories\AmenityRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PropertyRepository;

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
