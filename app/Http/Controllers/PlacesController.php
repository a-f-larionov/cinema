<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PlaceRepositoryInterface;
use Illuminate\View\View;

/**
 * Class PlacesController
 * @package App\Http\Controllers
 */
class PlacesController extends Controller
{
    /**
     * @param int $eventId
     * @param PlaceRepositoryInterface $placeRepository
     * @return View
     */
    public function places(int $eventId, PlaceRepositoryInterface $placeRepository): View
    {
        return view('events-places-list',
            [
                'eventId' => $eventId,
                'places' => $placeRepository->getList($eventId)
            ]
        );
    }
}
