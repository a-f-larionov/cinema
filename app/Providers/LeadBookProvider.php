<?php

namespace App\Providers;

use App\Api\LeadBookApiClient;
use App\Managers\Interfaces\PlacesManagerInterface;
use App\Managers\LeadBook\PlacesManager;
use App\Repositories\Interfaces\EventsRepositoryInterface;
use App\Repositories\Interfaces\PlaceRepositoryInterface;
use App\Repositories\Interfaces\ShowsRepositoryInterface;
use App\Repositories\LeadBook\EventsRepository;
use App\Repositories\LeadBook\PlaceRepository;
use App\Repositories\LeadBook\ShowsRepository;
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
        $this->app->bind(ShowsRepositoryInterface::class,
            ShowsRepository::class);

        $this->app->bind(EventsRepositoryInterface::class,
            EventsRepository::class);

        $this->app->bind(PlaceRepositoryInterface::class,
            PlaceRepository::class);

        // Регистрация менеджеров
        $this->app->bind(PlacesManagerInterface::class,
            PlacesManager::class);
    }

}
