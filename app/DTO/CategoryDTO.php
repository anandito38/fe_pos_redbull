<?php

namespace App\DTO;
class CategoryDTO{
    public function __construct(
        public ?int $id,
        public ?string $namaCategory = null,
    )
    {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNamaCategory(): string
    {
        return $this->namaCategory;
    }

    public function setNamaCategory(string $namaCategory): void
    {
        $this->namaCategory = $namaCategory;
    }
}

?>
