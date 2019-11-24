<?php

namespace App\Repositories;

use App\Api\LeadBookApiClient;
use App\Models\Place;
use App\Repositories\Interfaces\PlaceRepository;
use GuzzleHttp\Exception\GuzzleException;

class LeadBookPlaceRepository implements PlaceRepository
{
    /**
     * @var LeadBookApiClient
     */
    private LeadBookApiClient $api;

    /**
     * LeadBookPlaceRepository constructor.
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
            ->map(function ($data) {

                $place = new Place();
                $place->setId($data->id);
                $place->setX($data->x);
                $place->setY($data->y);
                $place->setWidth($data->width);
                $place->setHeight($data->height);
                $place->setIsAvailable($data->is_available);

                return $place;
            });

        return $collection;
    }
}
