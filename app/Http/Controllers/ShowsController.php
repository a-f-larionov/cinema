<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ShowsRepository;

class ShowsController extends Controller
{
    /**
     * @param ShowsRepository $eventsRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shows(ShowsRepository $eventsRepository)
    {
        return view('shows-list', [
            'shows' => $eventsRepository->getList()
        ]);
    }
}
