<?php

namespace App\Repositories;

use App\Api\LeadBookApiClient;
use App\Models\Show;
use App\Repositories\Interfaces\ShowsRepository;
use App\Repositories\Interfaces\ShowsRepositoryInterface;

/**
 * Class LeadBookShowsRepository
 * @package App\Repositories
 */
class LeadBookShowsRepository implements ShowsRepositoryInterface
{
    /**
     * @var LeadBookApiClient
     */
    private LeadBookApiClient $api;

    /**
     * LeadBookShowsRepository constructor.
     * @param LeadBookApiClient $api
     */
    public function __construct(LeadBookApiClient $api)
    {
        $this->api = $api;
    }

    public function getList(): iterable
    {
        $response = $this->api->shows();

        $collection = collect($response)
            ->map(function ($data) {
                $event = new Show();
                $event->setId($data->id);
                $event->setName($data->name);
                return $event;
            });

        return $collection;
    }
}
