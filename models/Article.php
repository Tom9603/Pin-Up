<?php

class Article {
    private $id_article;
    private $title;
    private $content;
    private $date_creation;
    private $id_user;
    private $id_admin;
    private $id_category;

    public function __construct($id_article, $title, $content, $date_creation, $id_user, $id_admin, $id_category) {
        $this->id_article = $id_article;
        $this->title = $title;
        $this->content = $content;
        $this->date_creation = $date_creation;
        $this->id_user = $id_user;
        $this->id_admin = $id_admin;
        $this->id_category = $id_category;
    }

    // GET/SET ID Article
    public function getIdArticle(): ?int {
        return $this->id_article;
    }

    public function setIdArticle(?int $id_article): void {
        $this->id_article = $id_article;
    }

    // GET/SET Title
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    // GET/SET Content
    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    // GET/SET Date Creation
    public function getDateCreation(): DateTime {
        return $this->date_creation;
    }

    public function setDateCreation(DateTime $date_creation): void {
        $this->date_creation = $date_creation;
    }

    // GET/SET ID User
    public function getIdUser(): ?int {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void {
        $this->id_user = $id_user;
    }

    // GET/SET ID Admin
    public function getIdAdmin(): ?int {
        return $this->id_admin;
    }

    public function setIdAdmin(?int $id_admin): void {
        $this->id_admin = $id_admin;
    }

    // GET/SET ID Category
    public function getIdCategory(): ?int {
        return $this->id_category;
    }

    public function setIdCategory(?int $id_category): void {
        $this->id_category = $id_category;
    }
}