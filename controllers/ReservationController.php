<?php

class ReservationController
{
    private ReservationManager $reservationManager;

    public function __construct(PDO $db)
    {
        // Important : activer les exceptions PDO (tu peux aussi le faire dans AbstractManager)
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->reservationManager = new ReservationManager($db);
    }

    /** GET /reservations */
    public function index(): void
    {
        $reservations = $this->reservationManager->findAll();
        require __DIR__ . '/../views/reservation/index.php';
    }

    /** GET /reservations/{id} */
    public function show(int $id): void
    {
        $reservation = $this->reservationManager->findOne($id);
        if (!$reservation) {
            http_response_code(404);
            echo "Réservation introuvable.";
            return;
        }
        require __DIR__ . '/../views/reservation/show.php';
    }

    /** GET /reservations/create (formulaire) */
    public function createForm(): void
    {
        require __DIR__ . '/../views/reservation/create.php';
    }

    /** POST /reservations (création) */
    public function store(): void
    {
        // Récupération / validation basique
        $idUser  = isset($_POST['id_user'])  ? (int) $_POST['id_user']  : 0;
        $idEvent = isset($_POST['id_event']) ? (int) $_POST['id_event'] : 0;

        if ($idUser <= 0 || $idEvent <= 0) {
            http_response_code(422);
            $error = "id_user et id_event sont requis.";
            // Réafficher le form avec erreur
            require __DIR__ . '/../views/reservation/create.php';
            return;
        }

        // Date actuelle pour la résa
        $now = new \DateTimeImmutable('now');

        // Créer l'entité sans id (auto-incrément)
        $reservation = new Reservation(
            null,          // id_reservation
            $idUser,
            $idEvent,
            $now
        );

        // Persister
        $created = $this->reservationManager->createReservation($reservation);
        if (!$created) {
            http_response_code(500);
            $error = "Impossible de créer la réservation.";
            require __DIR__ . '/../views/reservation/create.php';
            return;
        }
    }

    /** POST /reservations/{id}/delete */
    public function delete(int $id): void
    {
        $ok = $this->reservationManager->deleteReservation($id);

        if (!$ok) {
            http_response_code(500);
            echo "Suppression impossible.";
            return;
        }

        header('Location: /reservations');
        exit;
    }
}
