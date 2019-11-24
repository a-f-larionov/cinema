<?php

namespace App\Repositories\Interfaces;

/**
 * Interface EventsRepository
 * @package App\Repositories\Interfaces
 */
interface EventsRepository
{
    /**
     * @param int $showId
     * @return iterable
     */
    public function getList(int $showId): iterable;
}
