<?php

class ReservationManager extends AbstractManager
{
    // Créer une réservation
    public function createReservation(Reservation $reservation): ?Reservation {
        $query = $this->db->prepare(
            "INSERT INTO reservations (id_user, id_event, date_reservation) VALUES (:id_user, :id_event, :date_reservation)"
        );
        $result = $query->execute([
            'id_user' => $reservation->getIdUser(),
            'id_event' => $reservation->getIdEvent(),
            'date_reservation' => $reservation->getDateReservation()->format('Y-m-d H:i:s')
        ]);
        if ($result) {
            $id_reservation = (int)$this->db->lastInsertId();
            $reservation->setIdReservation($id_reservation);
            return $reservation;
        } else {
            return null;
        }
    }

    // Retrouver une résa par l'id
    public function findOne(int $id_reservation): ?array {
        $query = $this->db->prepare(
            "SELECT * FROM reservations WHERE id_reservation = :id_reservation"
        );
        $query->execute(['id_reservation' => $id_reservation]);
        $reservation = $query->fetch(PDO::FETCH_ASSOC);
        return $reservation ?: null;
    }

    // Récupérer toutes les résa
    public function findAll(): array {
        $query = $this->db->query("SELECT * FROM reservations");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Supprimer une résa
    public function deleteReservation(int $id_reservation): bool {
        $query = $this->db->prepare(
            "DELETE FROM reservations WHERE id_reservation = :id_reservation"
        );
        return $query->execute(['id_reservation' => $id_reservation]);
    }
}