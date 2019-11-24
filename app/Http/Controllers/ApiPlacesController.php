<?php

namespace App\Http\Controllers;

use App\Managers\Interfaces\PlacesManagerInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Контролер api для работы с местами.
 * Class ApiPlacesController
 * @package App\Http\Controllers
 */
class ApiPlacesController extends ApiController
{
    /**
     * Выполнить резерв места.
     * @param Request $request
     * @param PlacesManagerInterface $placesManager
     * @return Response
     */
    public function reserve(Request $request, PlacesManagerInterface $placesManager)
    {
        $eventId = (int)$request->post('eventId');
        $placeIds = (array)$request->post('placeIds');
        $userName = (string)$request->post('userName');

        if ($eventId < 1) {
            return $this->responseWithFailed("Передайте eventId.");
        }
        if (empty($placeIds)) {
            return $this->responseWithFailed("Передайте placeIds.");
        }
        if (empty(trim($userName))) {
            return $this->responseWithFailed("Передайте userName.");
        }

        $reservationId = $placesManager->eventsPlacesReserve($eventId, $placeIds, $userName);

        return $this->responseJSON([
            'reservationId' => $reservationId
        ]);
    }
}
