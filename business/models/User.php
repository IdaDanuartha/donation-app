<?php
require_once "Model.php";

class User extends Model {
    private $table = 'users',
            $db;

    public function __construct() {
        $this->db = new Model();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->all();
    }

    public function createUser($data)
    {
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)");

        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $hash);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email = :email");
        $this->db->bind('email', $email);
        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function login($data)
    {
        $userEmail = $data['email'];
        $row = $this->findUserByEmail($userEmail);
        if($row == false) return false;

        $hashedPass = $row['password'];

        if(password_verify($data['password'], $hashedPass)) {
            $_SESSION['user_session'] = $data['id'];
            return $row;
        } else {
            return false;
        }
    }
    
}