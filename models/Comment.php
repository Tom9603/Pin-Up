<?php

class Comment {
    private $id_comment;
    private $id_user;
    private $id_article;
    private $content;
    private $date_comment;

    public function __construct($id_comment, $id_user, $id_article, $content, $date_comment) {
        $this->id_comment = $id_comment;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
        $this->content = $content;
        $this->date_comment = $date_comment;
    }

    // GET/SET ID Comment
    public function getIdComment(): ?int {
        return $this->id_comment;
    }

    public function setIdComment(?int $id_comment): void {
        $this->id_comment = $id_comment;
    }

    // GET/SET ID User
    public function getIdUser(): ?int {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void {
        $this->id_user = $id_user;
    }

    // GET/SET ID Article
    public function getIdArticle(): ?int {
        return $this->id_article;
    }

    public function setIdArticle(?int $id_article): void {
        $this->id_article = $id_article;
    }

    // GET/SET Content
    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    // GET/SET Date Comment
    public function getDateComment(): DateTime {
        return $this->date_comment;
    }

    public function setDateComment(DateTime $date_comment): void {
        $this->date_comment = $date_comment;
    }
}