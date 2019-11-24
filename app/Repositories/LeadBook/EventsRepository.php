<?php

namespace App\Repositories\LeadBook;

use App\Api\LeadBookApiClient;
use App\Models\Event;
use App\Repositories\Interfaces\EventsRepositoryInterface;
use GuzzleHttp\Exception\GuzzleException;

class EventsRepository implements EventsRepositoryInterface
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
            ->map(
                fn ($data) => Event::createFromArray((array)$data)
            );

        return $collection;
    }
}
