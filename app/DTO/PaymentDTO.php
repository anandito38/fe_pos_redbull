<?php

namespace App\DTO;
class PaymentDTO{
    public function __construct(
        public ?int $id,
        public ?string $barcode = null,
        public ?bool $status = null,
        public ?string $metode = null,
        public ?int $booking_id = null,
        public ?int $admin_id = null
    ){}

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(): int{
        return $this->id;
    }

    public function setBarcode(string $barcode){
        $this->barcode = $barcode;
    }

    public function getBarcode(): string{
        return $this->barcode;
    }

    public function setStatus(bool $status){
        $this->status = $status;
    }

    public function getStatus(): bool{
        return $this->status;
    }

    public function setMetode(string $metode){
        $this->metode = $metode;
    }

    public function getMetode(): string{
        return $this->metode;
    }

    public function setBookingId(int $booking_id){
        $this->booking_id = $booking_id;
    }

    public function getBookingId(): int{
        return $this->booking_id;
    }

    public function setAdminId(int $admin_id){
        $this->admin_id = $admin_id;
    }

    public function getAdminId(): int{
        return $this->admin_id;
    }
}
