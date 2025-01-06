<?php

class Car extends CoreEntity
{
    private int $id;
    private int $modelId;
    private int $brandId;
    private int $year;
    private ?int $kilometers;
    private ?string $fuelType;
    private ?string $licensePlate;
    private ?string $notes;
    private int $useId;
    private string $fullname;
    private string $model;
    private string $brand;

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
    public function getBrandId(): string
    {
        return $this->brandId;
    }

    /**
     * @return string
     */
    public function getModelId(): string
    {
        return $this->modelId;
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
        return $this->useId;
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
     * @param int $brandId
     */
    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
    }

    /**
     * @param int $modelId
     */
    public function setModelId(int $modelId): void
    {
        $this->modelId = $modelId;
    }

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
    public function setUseId(int $useId): void
    {
        $this->useId = $useId;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
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
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }
}
