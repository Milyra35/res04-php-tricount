<?php

require 'AbstracManager.php';

class UserManager extends AbstractManager {
    
    public function getAllUsers() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    
    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.id = :id");
        $parameters = ["id" => $id];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function getUserByEmail(string $email) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.email = :email");
        $parameters = ['email' => $email];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function insertUser(User $user) : User
    {
        $query = $this->db->prepare("INSERT INTO users (email, username, password)
                               VALUES (?, ?, ?)");
        $query->execute([$user->getEmail(), $user->getUsername(), $user->getPassword()]);
        $query = $this->db->prepare("SELECT * FROM users WHERE users.email = :email");
        $parameters = ['email' => $user->getEmail()];
        $query->execute($parameters);
        $userId = $query->fetch(PDO::FETCH_ASSOC);
        $user->setId($userId['id']);
        return $user;
    }
    
    public function editUser(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET users.username = :username, users.email = :email, users.password = :password WHERE users.id = :id");
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'id' => $user->getId()
        ];
        $query->execute($parameters);
    }
}

?>