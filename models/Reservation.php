<?php

class Reservation {
    private ?int $id_reservation;
    private ?int $id_user;
    private ?int $id_event;
    private \DateTimeImmutable $date_reservation;

    public function __construct(?int $id_reservation, ?int $id_user, ?int $id_event, \DateTimeImmutable $date_reservation) {
        $this->id_reservation = $id_reservation;
        $this->id_user = $id_user;
        $this->id_event = $id_event;
        $this->date_reservation = $date_reservation;
    }

    // GET/SET ID Reservation
    public function getIdReservation(): ?int {
        return $this->id_reservation;
    }

    public function setIdReservation(?int $id_reservation): void {
        $this->id_reservation = $id_reservation;
    }   

    // GET/SET ID User
    public function getIdUser(): ?int {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void {
        $this->id_user = $id_user;
    }

    // GET/SET ID Event
    public function getIdEvent(): ?int {
        return $this->id_event;
    }

    public function setIdEvent(?int $id_event): void {
        $this->id_event = $id_event;
    }

    // GET/SET Date Reservation
    public function getDateReservation(): \DateTimeImmutable {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeImmutable $date_reservation): void {
        $this->date_reservation = $date_reservation;
    }
}