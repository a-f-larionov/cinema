<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EventsRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    /**
     * @param int $showId
     * @param EventsRepository $eventsRepository
     * @return Factory|View
     */
    public function events(int $showId, EventsRepository $eventsRepository)
    {
        return view('shows-events-list',
            [
                'events' => $eventsRepository->getList($showId)
            ]
        );
    }
}
