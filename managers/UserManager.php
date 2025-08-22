<?php

class UserManager extends AbstractManager
{
    public function createUser(User $user): ?User
    {
        $query = $this->db->prepare(query: "INSERT INTO users (pseudo, email, password, role) VALUES (:pseudo, :email, :password, :role)");

        $result = $query->execute(params: [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ]);

        if ($result) {
            $id_user = (int) $this->db->lastInsertId();
            $user->setIdUser($id_user);
            return $user;
            } else {
            return null;
            }
    }

    // Met à jour un utilisateur avec UPDATE
    public function updateUser(User $user): bool
    {
        $query = $this->db->prepare(
            "UPDATE users SET pseudo = :pseudo, email = :email, role = :role WHERE id_user = :id_user"
        );
        return $query->execute(params: [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'id_user' => $user->getIdUser()
        ]);
    }

    // Supprime un utilisateur avec DELETE
    public function deleteUser(int $id_user): bool
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id_user = :id_user");
        return $query->execute(['id_user' => $id_user]);
    }

    // Récupère un utilisateur par id_user avec findOne
    public function findOne(int $id_user): ?array
    {
        $query = $this->db->prepare("SELECT id_user, pseudo, email, role, password, date_inscription FROM users WHERE id_user = :id_user");
        $query->execute(['id_user' => $id_user]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
            } else {
            return null;
            }
    }

    // Récupère tous les utilisateurs avec findAll
    public function findAll(): array
    {
        $query = $this->db->query("SELECT id_user, pseudo, email, role, password, date_inscription FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}