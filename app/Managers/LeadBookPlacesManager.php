<?php

namespace App\Managers;

use App\Api\LeadBookApiClient;
use App\Managers\Interfaces\PlacesManagerInterface;

/**
 * Менеджер для работы с
 * Class PlacesManager
 * @package App\Managers
 */
class LeadBookPlacesManager implements PlacesManagerInterface
{

    /**
     * @var LeadBookApiClient
     */
    private LeadBookApiClient $client;

    /**
     * LeadBookPlacesManager constructor.
     * @param LeadBookApiClient $leadBookApi
     */
    public function __construct(LeadBookApiClient $leadBookApi)
    {
        $this->client = $leadBookApi;
    }

    /**
     * @inheritDoc
     */
    public function eventsPlacesReserve(int $eventId, array $placeIds, string $userName): string
    {
        return
            $this->client->eventsPlacesReserve($eventId, $placeIds, $userName)
                ->reservation_id;
    }
}
