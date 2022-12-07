<?php
namespace mvc\models;

use mvc\core\Model;

class Note extends Model {
    public function get_all() {
        return $this->db->query("SELECT * FROM notes");
    }

    public function get($note_id) {
        return $this->db->query("SELECT * FROM notes WHERE id = '$note_id';");
    }

    public function create() {

    }

    public function delete($note_id) {
        $this->db->query("DELETE FROM notes WHERE id = '$note_id';");
    }
}