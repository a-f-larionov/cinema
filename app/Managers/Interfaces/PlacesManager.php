<?php

namespace App\Managers\Interfaces;

/**
 * Интерфейс менеджера мест.
 * Interface PlacesManager
 * @package App\Managers\Interfaces
 */
interface PlacesManager
{
    /**
     * Резервирует место, возвращает id резерва.
     * @param int $eventId id события
     * @param array $placeIds массив id мест
     * @param string $userName имя человека производящего резерв
     * @return string id резерва
     */
    public function eventsPlacesReserve(int $eventId, array $placeIds, string $userName): string;
}
