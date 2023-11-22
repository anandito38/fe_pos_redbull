<?php

namespace App\DTO;
class MemilihDTO{
    public function __construct(
        public ?int $idBook,
        public ?int $idProduct,
    ){}

    public function getIdBook(): int
    {
        return $this->idBook;
    }

    public function setIdBook(int $idBook): void
    {
        $this->idBook = $idBook;
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
