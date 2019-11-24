<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EventsRepositoryInterface;
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
     * @param EventsRepositoryInterface $eventsRepository
     * @return Factory|View
     */
    public function events(int $showId, EventsRepositoryInterface $eventsRepository)
    {
        return view('shows-events-list',
            [
                'events' => $eventsRepository->getList($showId)
            ]
        );
    }
}
