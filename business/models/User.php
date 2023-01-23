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
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->all();
    }

    public function findUserById()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind('id', 1);
        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function createUser($data)
    {
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO {$this->table} (username, email, password, level) VALUES (:username, :email, :password, :level)");

        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $hash);
        $this->db->bind('level', $data['level']);

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
            $_SESSION['user_session'] = $row;
            $_SESSION['login'] = true;
            return $row;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['login']);

        return true;
    }
    
}