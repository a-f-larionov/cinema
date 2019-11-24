<?php

namespace App\Models;

/**
 * События
 * Class Event
 * @package App\Models
 */
class Event
{
    /**
     * @var int id события
     */
    private int $id;

    /**
     * @var int id мероприятия
     */
    private int $showId;

    /**
     * @var int дата события unix timestamp
     */
    private int $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getShowId(): int
    {
        return $this->showId;
    }

    /**
     * @param int $showId
     */
    public function setShowId(int $showId): void
    {
        $this->showId = $showId;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Возвращает человеко понятную дату.
     * @return string
     */
    public function getHumanDate(): string
    {
        return date("Y-m-d H:i:s", $this->date);
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * Возвращает детальную страницу события(список мест).
     * @return string
     */
    public function getDetailPageUrl(): string
    {
        return '/events/' . $this->getId() . '/places';
    }
}
