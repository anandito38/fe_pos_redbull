<?php

namespace App\DTO;
class MemproduksiDTO{
    public function __construct(
        public ?int $idVendor,
        public ?int $idProduct,
    ){}

    public function getIdVendor(): int
    {
        return $this->idVendor;
    }

    public function setIdVendor(int $idVendor): void
    {
        $this->idVendor = $idVendor;
    }

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }
}

?>
