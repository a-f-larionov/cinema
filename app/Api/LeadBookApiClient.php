<?php

namespace App\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

/**
 * Елиент LeadBook
 * Class LeadBookApi
 * @package App\Api
 */
class LeadBookApiClient
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @var string
     */
    private string $urlPrefix;

    /**
     * Токен авторизации.
     * @var string
     */
    private string $token;

    /**
     * LeadBookApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client, string $token, string $urlPrefix)
    {
        $this->client = $client;
        $this->token = $token;
        $this->urlPrefix = $urlPrefix;
    }

    /**
     * @param string $url
     * @param array $data
     * @param string $method
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    private function call(string $url, $data = [], $method = Request::METHOD_GET)
    {
        $uri = $this->urlPrefix . $url;

        $options = [
            'headers' => [
                'Authorization' => 'token=' . $this->token,
            ],
            'form_params' => $data
        ];

        $answer = $this->client->request($method, $uri, $options);

        if (!in_array($method, ['GET', 'POST'])) {
            throw new Exception("Метод не обрабатывется: " . $method);
        }

        if ($answer->getStatusCode() !== Response::HTTP_OK) {
            throw new Exception("Lead Book API return" . $answer->getStatusCode() . ' code.');
        }

        /** @var object $json */
        $json = \GuzzleHttp\json_decode(
            $answer->getBody()
                ->getContents()
        );
        if (empty($json) || !is_object($json)) {
            throw new Exception("Lead Book API return wrong data. `" . $answer->getBody()->getContents() . '`  ' . $uri);
        }

        if (isset($json->error)) {
            throw new Exception("Lead Book API return error message: `" . $json->error . "`");
        }

        if (!$json->response) {
            throw new Exception("Lead Book API does not return response: `" . \GuzzleHttp\json_encode($json) . "`");
        }
        $response = $json->response;

        return $response;
    }

    /**
     * @return array
     * @throws Exception
     * @throws GuzzleException
     */
    public function shows(): array
    {
        return $this->call('/shows');
    }

    /**
     * @param int $showId
     * @return array
     * @throws Exception
     * @throws GuzzleException
     */
    public function showsEventsById(int $showId): array
    {
        return $this->call('/shows/' . $showId . '/events');
    }

    /**
     * @param int $eventId
     * @return array
     * @throws Exception
     * @throws GuzzleException
     */
    public function eventsPlacesByEventId(int $eventId): array
    {
        return $this->call('/events/' . $eventId . '/places');
    }

    /**
     * @param int $eventId id события
     * @param array $placeIds массив id мест
     * @param string $userName имя человека
     * @return object
     * @throws Exception
     * @throws GuzzleException
     */
    public function eventsPlacesReserve(int $eventId, array $placeIds, string $userName): object
    {
        return $this->call('/events/' . $eventId . '/reserve', [
            'name' => $userName,
            'places' => $placeIds
        ], Request::METHOD_POST);
    }
}
