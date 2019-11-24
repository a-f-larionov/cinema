<?php

namespace App\Repositories\Interfaces;

/**
 * Interface EventsRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface EventsRepositoryInterface
{
    /**
     * @param int $showId
     * @return iterable
     */
    public function getList(int $showId): iterable;
}
