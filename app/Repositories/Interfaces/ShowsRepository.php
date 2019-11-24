<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ShowsRepository
 * @package App\Repositories\Interfaces
 */
interface ShowsRepository
{
    /**
     * @return iterable
     */
    public function getList(): iterable;
}
