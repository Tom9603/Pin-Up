<?php
class UserController
{
    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    // Créer un user et chiffre le mdp
    public function create(array $new): ?User {
        $new['password'] = password_hash(password: $new['password'], default: PASSWORD_DEFAULT);

        $user = new User(
            pseudo: $new['pseudo'],
            email: $new['email'],
            password: $new['password']
        );
        if (isset($new['role'])) {
            $user->setRole(role: $new['role']);
        }
        return $this->userManager->createUser(user: $user);
    }

    // Mise à jour d'un user
    public function update(int $id_user, array $maj): bool {
        $userArray = $this->userManager->findOne(id_user: $id_user);
        if (!$userArray) {
            return false;
        }
        $user = new User(pseudo: $userArray['pseudo'], email: $userArray['email'], password: $userArray['password']);
        $user->setIdUser(id_user: $id_user);
        if (isset($maj['pseudo'])) $user->setPseudo(pseudo: $maj['pseudo']);
        if (isset($maj['email'])) $user->setEmail(email: $maj['email']);
        if (isset($maj['role'])) $user->setRole(role: $maj['role']);
        return $this->userManager->updateUser(user: $user);
    }

    // Supprime un user
    public function delete(int $id_user): bool {
        return $this->userManager->deleteUser(id_user: $id_user);
    }

    // Affiche un user
    public function show(int $id_user): ?array {
        return $this->userManager->findOne(id_user: $id_user);
    }

    // Liste tous les users
    public function list(): array
    {
        return $this->userManager->findAll();
    }
}