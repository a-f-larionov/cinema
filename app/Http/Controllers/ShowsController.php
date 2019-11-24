<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ShowsRepositoryInterface;

class ShowsController extends Controller
{
    /**
     * @param ShowsRepositoryInterface $eventsRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shows(ShowsRepositoryInterface $eventsRepository)
    {
        return view('shows-list', [
            'shows' => $eventsRepository->getList()
        ]);
    }
}
