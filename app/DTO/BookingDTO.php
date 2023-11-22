<?php

namespace App\DTO;
class BookingDTO{
    public function __construct(
        public ?int $id,
        public ?int $quantity = null,
        public ?string $kode = null,
        public ?int $totalHarga = null,
        public ?int $customer_id = null,
        public ?string $external_id = null
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): int
    {
        return $this->id = $id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): int
    {
        return $this->quantity = $quantity;
    }

    public function getKode(): string
    {
        return $this->kode;
    }

    public function setKode(string $kode): string
    {
        return $this->kode = $kode;
    }

    public function getTotalHarga(): int
    {
        return $this->totalHarga;
    }

    public function setTotalHarga(int $totalHarga): int
    {
        return $this->totalHarga = $totalHarga;
    }

    public function getCustomer_id(): int
    {
        return $this->customer_id;
    }

    public function setCustomer_id(int $customer_id): int
    {
        return $this->customer_id = $customer_id;
    }

    public function getExternal_id(): string
    {
        return $this->external_id;
    }

    public function setExternal_id(string $external_id): string
    {
        return $this->external_id = $external_id;
    }
}

?>
