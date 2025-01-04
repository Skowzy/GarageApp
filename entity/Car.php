<?php

class Car extends CoreEntity
{
    private int $id;
    private string $model;
    private string $brand;
    private int $year;
    private ?int $kilometers;
    private ?string $fuelType;
    private ?string $licensePlate;
    private ?string $notes;
    private int $use_id;
    private string $fullname;

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
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int|null
     */
    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    /**
     * @return int
     */
    public function getUseId(): int
    {
        return $this->use_id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $model
     * @return void
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param string $brand
     * @return void
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param int $year
     * @return void
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @param int | null $kilometers
     * @return void
     */
    public function setKilometers(?int $kilometers): void
    {
        $this->kilometers = $kilometers;
    }

    /**
     * @param int $use_id
     * @return void
     */
    public function setUseId(int $use_id): void
    {
        $this->use_id = $use_id;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string|null
     */
    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    /**
     * @return string|null
     */
    public function getLicensePlate(): ?string
    {
        return $this->licensePlate;
    }

    /**
     * @param string|null $fuelType
     */
    public function setFuelType(?string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @param string|null $licensePlate
     */
    public function setLicensePlate(?string $licensePlate): void
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }
}
