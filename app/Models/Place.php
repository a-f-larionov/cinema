<?php

namespace App\Models;

/**
 * Class Place
 * @package App\Models
 */
class Place
{
    /**
     * @var int
     */
    private int $id;

    /**
     * Координата X
     * @var float
     */
    private float $x;

    /**
     * Координата Y
     * @var float
     */
    private float $y;

    /**
     * Ширина
     * @var float
     */
    private float $width;

    /**
     * Высота
     * @var float
     */
    private float  $height;

    /**
     * Место доступно
     * @var bool
     */
    private bool $is_available;

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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->is_available;
    }

    /**
     * @param bool $is_available
     */
    public function setIsAvailable(bool $is_available): void
    {
        $this->is_available = $is_available;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @param float $x
     */
    public function setX(float $x): void
    {
        $this->x = $x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @param float $y
     */
    public function setY(float $y): void
    {
        $this->y = $y;
    }
}
