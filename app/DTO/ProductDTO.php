<?php

namespace App\DTO;
class ProductDTO{
    public function __construct(
        public ?int $id,
        public ?string $nama = null,
        public ?string $kode = null,
        public ?int $hargaJual = null,
        public ?int $quantity = null,
        public ?string $external_id = null
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

    public function getHargaJual(): int
    {
        return $this->hargaJual ?? 0;
    }

    public function setHargaJual(int $hargaJual): void
    {
        $this->hargaJual = $hargaJual;
    }

    public function getQuantity(): int
    {
        return $this->quantity ?? 0;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getExternalId(): string
    {
        return $this->external_id;
    }

    public function setExternalId(string $external_id): void
    {
        $this->external_id = $external_id;
    }
}
?>
