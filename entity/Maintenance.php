<?php

class Maintenance extends CoreEntity
{
    private int $id;
    private ?string $name;
    private ?string $description;
    private ?int $price;
    private ?int $date;
    private int $car_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }
    /**
     * @return int
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getCarId(): int
    {
        return $this->car_id;
    }

    /**
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    /**
     * @param string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param int $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @param int $car_fk
     */
    public function setCarFk(int $car_id): void
    {
        $this->$car_id = $car_id;
    }

    /**
     * @param int $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}