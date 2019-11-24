<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PlaceRepository
 * @package App\Repositories\Interfaces
 */
interface PlaceRepository
{
    /**
     * @param int $eventId
     * @return iterable
     */
    public function getList(int $eventId): iterable;
}
