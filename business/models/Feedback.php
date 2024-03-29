<?php
require_once "Model.php";

class Feedback extends Model {
    private $table = 'feedbacks',
            $table2 = 'users',
            $db;

    public function __construct() {
        $this->db = new Model();
    }

    public function getFeedbacks($keyword)
    {
        $query = "SELECT {$this->table}.*, {$this->table2}.username FROM {$this->table} INNER JOIN {$this->table2} ON {$this->table2}.id = {$this->table}.user_id WHERE subject LIKE :keyword ORDER BY created_at DESC";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");

        return $this->db->all();
    }

    public function getFeedback($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getUserFeedbacks($keyword)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id=:id AND subject LIKE :keyword ORDER BY created_at DESC";

        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user_session']['id']);
        $this->db->bind("keyword", "%$keyword%");

        return $this->db->all();
    }

    public function store($data) {
        $query = "INSERT INTO {$this->table}
                    VALUES
                (null, :user_id, :subject, :critics, :suggestion, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('user_id', $_SESSION['user_session']['id']);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('critics', $data['critics']);
        $this->db->bind('suggestion', $data['suggestion']);
        $this->db->bind('created_at', date('Y-m-d H:i:s'));
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function update($data, $id) {

        $query = "UPDATE {$this->table} SET
                subject = :subject,                
                critics = :critics,
                suggestion = :suggestion,
                updated_at = :updated_at
              WHERE id = $id";

        $this->db->query($query);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('critics', $data['critics']);
        $this->db->bind('suggestion', $data['suggestion']);
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));

        $this->db->execute();

        return $this->db->rowCount();
    } 

    public function destroy($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
}