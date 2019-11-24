<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ShowsRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface ShowsRepositoryInterface
{
    /**
     * @return iterable
     */
    public function getList(): iterable;
}
