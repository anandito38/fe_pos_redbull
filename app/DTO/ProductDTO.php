<?php

namespace App\DTO;
class ProductDTO{
    public function __construct(
        public ?int $id,
        public ?string $nama = null,
        public ?string $kode = null,
        public ?string $hargaJual = null,
        public ?string $quantity = null,
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNama(string $nama): void
    {
        $this->nama = $nama;
    }

    public function getKode(): string
    {
        return $this->kode;
    }

    public function setKode(string $kode): void
    {
        $this->kode = $kode;
    }

    public function getHargaJual(): string
    {
        return $this->hargaJual;
    }

    public function setHargaJual(string $hargaJual): void
    {
        $this->hargaJual = $hargaJual;
    }

    public function getQuantity(): string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): void
    {
        $this->quantity = $quantity;
    }
}
?>
