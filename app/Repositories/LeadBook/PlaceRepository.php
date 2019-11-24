<?php

namespace App\Repositories\LeadBook;

use App\Api\LeadBookApiClient;
use App\Models\Place;
use App\Repositories\Interfaces\PlaceRepositoryInterface;
use GuzzleHttp\Exception\GuzzleException;

class PlaceRepository implements PlaceRepositoryInterface
{
    /**
     * @var LeadBookApiClient
     */
    private LeadBookApiClient $api;

    /**
     * LeadBookPlaceRepositoryInterface constructor.
     * @param LeadBookApiClient $api
     */
    public function __construct(LeadBookApiClient $api)
    {
        $this->api = $api;
    }

    /**
     * @param int $eventId
     * @return iterable
     * @throws GuzzleException
     */
    public function getList(int $eventId): iterable
    {
        $response = $this->api->eventsPlacesByEventId($eventId);

        $collection = collect($response)
            ->map(
                fn ($data) => Place::createFromArray((array)$data)
            );

        return $collection;
    }
}
