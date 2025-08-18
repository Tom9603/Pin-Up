<?php
    class Event {
        private $id_event;
        private $title;
        private $description;
        private $date_event;

        public function __construct($id_event, $title, $description, $date_event) {
            $this->id_event = $id_event;
            $this->title = $title;
            $this->description = $description;
            $this->date_event = $date_event;
        }

        // GET/SET ID Event
        public function getIdEvent(): ?int {
            return $this->id_event;
        }

        public function setIdEvent(?int $id_event): void {
            $this->id_event = $id_event;
        }

        // GET/SET Title
        public function getTitle(): string {
            return $this->title;
        }

        public function setTitle(string $title): void {
            $this->title = $title;
        }

        // GET/SET Description
        public function getDescription(): string {
            return $this->description;
        }

        public function setDescription(string $description): void {
            $this->description = $description;
        }

        // GET/SET Date Event
        public function getDateEvent(): DateTime {
            return $this->date_event;
        }

        public function setDateEvent(DateTime $date_event): void {
            $this->date_event = $date_event;
        }
    }
?>