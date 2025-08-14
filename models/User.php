<?php

class User
{
    private ?int $id_user = null;
    private string $pseudo = null;
    private string $email = null;
    private string $password = null;
    private DateTime $date_inscription = null;
    private string $role = null;

    public function __construct($pseudo, $email, $password)
    {
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->date_inscription = new DateTime();
        $this->role = "user";
    }

    // GET/SET ID
    public function getUser(): ?int
    {
        return $this->id_user;
    }

    public function setUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }

    // GET/SET Pseudo
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    // GET/SET Email
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // GET/SET Password
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // GET/SET Date d'inscription
    public function getDateInscription(): ?DateTime
    {
        return $this->date_inscription;
    }

    public function setDateInscription(?DateTime $date_inscription): void
    {
        $this->date_inscription = $date_inscription;
    }

    // GET/SET Role
    public function getRoleToJSON(): string
    {
        return json_encode(value: [$this->role]);
    }
    public function getRole(): array
    {
        return [$this->role];
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}
?>