<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ShowsRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ShowsController extends Controller
{
    /**
     * @param ShowsRepositoryInterface $eventsRepository
     * @return Factory|View
     */
    public function shows(ShowsRepositoryInterface $eventsRepository)
    {
        return view('shows-list', [
            'shows' => $eventsRepository->getList()
        ]);
    }
}
