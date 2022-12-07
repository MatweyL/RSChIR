<?php
namespace mvc\models;

use mvc\core\Model;
use PDO;

class Note extends Model {
    public function get_all() {
        return $this->db->query("SELECT * FROM notes");
    }

    public function get($note_id) {
        return $this->db->query("SELECT * FROM notes WHERE id = '$note_id';")->fetch(PDO::FETCH_BOTH);
    }

    public function create() {

    }

    public function delete($note_id) {
        $this->db->query("DELETE FROM notes WHERE id = '$note_id';");
    }
}