<?php

namespace App\Models;

/**
 * Class Show
 * @package App\Models
 */
class Show
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * Создать из массива с теми же полями.
     * @param $data
     * @return Show
     */
    public static function createFromArray(array $data): self
    {
        $self = new self();
        $self->setId($data['id']);
        $self->setName($data['name']);
        return $self;
    }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
