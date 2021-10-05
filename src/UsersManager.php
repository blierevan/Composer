<?php

// On inclut la classe User
require_once('Entity/User.php');

class UsersManager {

    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function __destruct()
    {
        // On se déconnecte de la base de données
        unset($this->_db);
    }

    public function setDb(PDO $db): UsersManager
    {
        $this->_db = $db;
        return $this;
    }

    public function add(User $user):bool
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le email, la force, les dégâts, l'expérience et le passwd du user.
        // Exécution de la requête.
        $query = $this->_db->prepare('INSERT INTO `tbl_users` (`email`, `passwd`) VALUES (:email, :passwd);');
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':passwd', $user->getPassword());

        return $query->execute();
    }

    public function delete(User $user):bool
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le email, la force, les dégâts, l'expérience et le passwd du user.
        // Exécution de la requête.
        return false;
    }

    public function getOne(int $id)
    {
        $sth = $this->_db->prepare('SELECT id, email, passwd FROM tbl_users WHERE id = ?');
        $sth->execute(array($id));
        $ligne = $sth->fetch();
        $user = new User($ligne);   
        return $user; 
    }

    public function getAll():array
    {
        $usersList = array();
        // Retourne la liste de tous les users.
        $request = $this->_db->query('SELECT id, email, passwd, roles FROM tbl_users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {
            $user = new User($ligne);   
            $usersList[] = $user;          
        }
        return $usersList;        
    }

    public function update(User $user):bool
    {
        // Prépare une requête de type UPDATE.
        // Assignation des valeurs à la requête.
        // Exécution de la requête.
        return false;
    }



}