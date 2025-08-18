<?php

class Category {
    private $id_category;
    private $name;

    public function __construct($id_category, $name) {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    // GET/SET ID Category
    public function getIdCategory(): ?int {
        return $this->id_category;
    }

    public function setIdCategory(?int $id_category): void {
        $this->id_category = $id_category;
    }

    // GET/SET Name
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
}