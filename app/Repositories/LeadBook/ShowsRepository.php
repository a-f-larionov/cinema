<?php

namespace App\Repositories\LeadBook;

use App\Api\LeadBookApiClient;
use App\Models\Show;
use App\Repositories\Interfaces\ShowsRepositoryInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class LeadBookShowsRepository
 * @package App\Repositories
 */
class ShowsRepository implements ShowsRepositoryInterface
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

    /**
     * @return iterable
     * @throws GuzzleException
     */
    public function getList(): iterable
    {
        $response = $this->api->shows();

        $collection = collect($response)
            ->map(
                fn ($data) => Show::createFromArray((array)$data)
            );

        return $collection;
    }
}
