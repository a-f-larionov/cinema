<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PlaceRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface PlaceRepositoryInterface
{
    /**
     * @param int $eventId
     * @return iterable
     */
    public function getList(int $eventId): iterable;
}
