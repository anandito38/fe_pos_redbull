<?php

namespace App\DTO;
class VendorDTO{
    public function __construct(
        public ?int $id,
        public ?string $namaBarang = null,
        public ?string $merek = null,
        public ?int $quantity = null,
        public ?int $hargaModal = null,
        public ?int $category_id = null
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): int
    {
        return $this->id = $id;
    }

    public function getNamaBarang(): string
    {
        return $this->namaBarang;
    }

    public function setNamaBarang(string $namaBarang): string
    {
        return $this->namaBarang = $namaBarang;
    }

    public function getMerek(): string
    {
        return $this->merek;
    }

    public function setMerek(string $merek): string
    {
        return $this->merek = $merek;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): int
    {
        return $this->quantity = $quantity;
    }

    public function getHargaModal(): int
    {
        return $this->hargaModal;
    }

    public function setHargaModal(int $hargaModal): int
    {
        return $this->hargaModal = $hargaModal;
    }

    public function getCategory_id(): int
    {
        return $this->category_id;
    }

    public function setCategory_id(int $category_id): int
    {
        return $this->category_id = $category_id;
    }
}

?>
