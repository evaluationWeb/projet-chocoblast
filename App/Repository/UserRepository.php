<?php

namespace App\Repository;

use App\Entity\Entity;
use App\Repository\AbstractRepository;
use App\Entity\User;


class UserRepository extends AbstractRepository
{
    //Constructeur
    public function __construct()
    {
        $this->setConnexion();
    }

    /**
     * Méthode pour enregistrer un User en BDD
     * @param User $user (Objet User à ajouter en BDD)
     * @return void ne retourne rien
     */
    public function saveUser(User $user): void
    {
        //1 écrire la requête SQL
        $request = "INSERT INTO users(firstname, lastname, email, pseudo, `password`, img_profile, grants, `status`)
        VALUE (?,?,?,?,?,?,?,?)";
        //2 préparation de la requête
        $req = $this->connexion->prepare($request);
        //3 assigner les paramètres
        $req->bindValue(1, $user->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue(2, $user->getLastname(), \PDO::PARAM_STR);
        $req->bindValue(3, $user->getEmail(), \PDO::PARAM_STR);
        $req->bindValue(4, $user->getPseudo(), \PDO::PARAM_STR);
        $req->bindValue(5, $user->getPassword(), \PDO::PARAM_STR);
        $req->bindValue(6, $user->getImgProfil(), \PDO::PARAM_STR);
        $req->bindValue(7, implode(",", $user->getGrants()), \PDO::PARAM_STR);
        $req->bindValue(8, $user->getStatus(), \PDO::PARAM_BOOL);
        //4 exécuter la requête
        $req->execute();
    }

    /**
     * Méthode pour rechercher un User avec son id
     * @param int $id id du User à chercher en BDD
     * @return Entity|null retourne un Objet User(Entity) ou null
     */
    public function findV2(int $id): ?Entity
    {
        $request = "SELECT id, firstname, lastname, email, pseudo, img_profile AS imgProfil, `password`, grants ,`status` 
        FROM users WHERE id = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $id, \PDO::PARAM_INT);
        $req->execute();
        $userTab = $req->fetch(\PDO::FETCH_ASSOC);
        $user = User::hydrateUser($userTab);
        return $user;
    }

    /**
     * Méthode pour rechercher un User avec son id
     * @param int $id id du User à chercher en BDD
     * @return Entity|null retourne un Objet User(Entity) ou null
     */
    public function find(int $id): ?Entity
    {
        $request = "SELECT id, firstname, lastname, email, `password`, grants AS `grant`, pseudo,
        `status`, img_profile AS imgProfil
        FROM users WHERE id = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $id, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class);
        $user = $req->fetch();
        $user->setGrants($user->grant);
        return $user;
    }

    /**
     * Méthode pour rechercher tous les User
     * @return array<Entity> retourne un tableau avec tous les User
     */
    public function findAll(): array
    {
        $request = "SELECT id, firstname, lastname, email, pseudo, img_profile AS imgProfil, 
        `password`, grants,`status` FROM users";
        $req = $this->connexion->prepare($request);
        $req->execute();
        $userTab = $req->fetchAll(\PDO::FETCH_ASSOC);
        $users = [];
        foreach ($userTab as $key => $value) {
            $users[] = User::hydrateUser($value);
        }
        return $users;
    }

    /**
     * Méthode pour rechercher tous les User
     * @return array<Entity> retourne un tableau avec tous les User
     */
    public function findAllV2(): array
    {
        $request = "SELECT id, firstname, lastname, email, `password`, grants AS `roles`, pseudo,
        `status`, img_profile AS imgProfil FROM users";
        $req = $this->connexion->prepare($request);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class);
        $users = $req->fetchAll();
        //Réassigner le tableau de roles grants
        foreach ($users as $key => $value) {
            $value->setGrants($value->roles);
        }
        return $users;
    }

    /**
     * Méthode qui vérifie si un compte existe avec son email
     * @param string $email
     * @return bool true si existe false si n'existe pas
     */
    public function isUserExistWithEmail(string $email): bool
    {
        $request = "SELECT u.id FROM users AS u WHERE email = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->execute();

        //Test si le compte n'existe pas
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Méthode qui vérifie si un compte existe avec son pseudo
     * @param string $pseudo
     * @return bool true si existe false si n'existe pas
     */
    public function isUserExistWithPseudo(string $pseudo): bool
    {
        $request = "SELECT u.id FROM users AS u WHERE pseudo = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $pseudo, \PDO::PARAM_STR);
        $req->execute();

        //Test si le compte n'existe pas
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Méthode qui vérifie si un compte existe avec son eamil ou pseudo
     * @param string $email
     * @param string $pseudo
     * @return bool true si existe false si n'existe pas
     */
    public function isUserExistWithEmailOrPseudo(string $email, string $pseudo): bool
    {
        $request = "SELECT u.id FROM users AS u WHERE u.email = ? OR u.pseudo = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->bindParam(2, $pseudo, \PDO::PARAM_STR);
        $req->execute();

        //Test si le compte n'existe pas
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Méthode pour récupérer un utilisateur avec son email
     * @param string $email
     * @return Entity|null retourne un objet User ou null si il n'existe pas
     */
    public function findUserByEmail(string $email): ?Entity
    {
        $request = "SELECT u.id, u.firstname, u.lastname, u.email, u.password, u.img_profile AS imgProfil,
        u.grants, u.pseudo, u.status  FROM users AS u WHERE u.email = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->execute();
        $userTab = $req->fetch(\PDO::FETCH_ASSOC);
        
        //Test si l'utilisateur n'existe pas
        if (!$userTab) {
            return null;
        }
        //hydrater le tableau
        $user = User::hydrateUser($userTab);

        return $user;
    }
}
