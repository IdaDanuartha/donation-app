<?php
require_once "Model.php";

class Review extends Model {
    private $table = 'reviews',
            $db;

    public function __construct() {
        $this->db = new Model();
    }

    public function getReviews($keyword)
    {
        $query = "call selectReviews()";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");

        return $this->db->all();
    }

    public function getReview($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function store($data) {
        $query = "call insertReview(:subject, :rating, :message, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('message', $data['message']);
        $this->db->bind('created_at', date('Y-m-d H:i:s'));
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function update($data, $id) {

        $query = "UPDATE {$this->table} SET
                subject = :subject,                
                rating = :rating,                
                message = :message,
                updated_at = :updated_at
              WHERE id = $id";

        $this->db->query($query);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('message', $data['message']);
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