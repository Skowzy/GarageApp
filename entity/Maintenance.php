<?php

class Maintenance extends CoreEntity
{
    private ?int $id;
    private ?string $name;
    private ?string $description;
    private ?string $photo;
    private ?int $price;
    private ?string $date;
    private ?int $carId;
    private ?string $model;
    private ?string $brand;
    private ?int $kilometers;

    /**
     * @return int|null
     */
    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    /**
     * @return string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }
    /**
     * @return string
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }
    /**
     * @return int
     */
    public function getId(): ?int
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
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }
    /**
     * @return string
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getCarId(): ?int
    {
        return $this->carId;
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
     * @param string|null $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @param string $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param int $carId
     */
    public function setCarId(?int $carId): void
    {
        $this->carId = $carId;
    }

    /**
     * @param int $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $car_brand
     */
    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param string $car_model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param int|null $kilometers
     */
    public function setKilometers(?int $kilometers): void
    {
        $this->kilometers = $kilometers;
    }
}