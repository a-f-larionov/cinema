<?php

namespace App\Repositories;

use App\Api\LeadBookApiClient;
use App\Models\Event;
use App\Repositories\Interfaces\EventsRepository;
use GuzzleHttp\Exception\GuzzleException;

class LeadBookEventsRepository implements EventsRepository
{
    /**
     * @var LeadBookApiClient
     */
    private LeadBookApiClient $api;

    /**
     * LeadBookEventsRepository constructor.
     * @param LeadBookApiClient $api
     */
    public function __construct(LeadBookApiClient $api)
    {
        $this->api = $api;
    }

    /**
     * @param int $showId
     * @return iterable
     * @throws \Exception
     * @throws GuzzleException
     */
    public function getList(int $showId): iterable
    {
        $response = $this->api->showsEventsById($showId);

        $collection = collect($response)
            ->map(function ($data) {
                $event = new Event();
                $event->setId($data->id);
                $event->setShowId($data->showId);
                $event->setDate(strtotime($data->date));
                return $event;
            });

        return $collection;
    }
}
