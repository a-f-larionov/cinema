<?php

namespace App\Providers;

use App\Api\LeadBookApiClient;
use App\Managers\Interfaces\PlacesManager;
use App\Managers\LeadBookPlacesManager;
use App\Repositories\Interfaces\EventsRepository;
use App\Repositories\Interfaces\PlaceRepository;
use App\Repositories\Interfaces\ShowsRepository;
use App\Repositories\LeadBookEventsRepository;
use App\Repositories\LeadBookPlaceRepository;
use App\Repositories\LeadBookShowsRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Обеспечивате регистрацию компонент для работы с Lead Book API.
 * Class LeadBookAPIProvider
 * @package App\Providers
 */
class LeadBookProvider extends ServiceProvider
{
    /**
     * Регистрация leadbook api.
     */
    public function register()
    {
        // Регистрация API
        $this->app->singleton(LeadBookApiClient::class, function () {
            return new LeadBookApiClient();
        });

        // Регистрация репозиториев
        $this->app->bind(ShowsRepository::class,
            LeadBookShowsRepository::class);

        $this->app->bind(EventsRepository::class,
            LeadBookEventsRepository::class);

        $this->app->bind(PlaceRepository::class,
            LeadBookPlaceRepository::class);

        // Регистрация менеджеров
        $this->app->bind(PlacesManager::class,
            LeadBookPlacesManager::class);
    }

}
