<?php
namespace mvc\models;

use mvc\core\Model;
use PDO;

class Note extends Model {
    public function get_all_api() {
        return $this->db->query("SELECT * FROM notes")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all() {
        return $this->db->query("SELECT * FROM notes");
    }


    public function get($note_id) {
        return $this->db->query("SELECT * FROM notes WHERE id = '$note_id';")->fetch(PDO::FETCH_BOTH);
    }

    public function get_api($note_id) {
        return $this->db->query("SELECT * FROM notes WHERE id = '$note_id';")->fetch(PDO::FETCH_ASSOC);
    }
    public function update($note_id, $title, $body) {
        $sql = "UPDATE `notes` SET `title` =  \"$title\", `body` = \"$body\" WHERE `id` = '$note_id'";
        $this->db->query($sql);
    }

    public function create($user_id, $title, $body) {
        $sql = "INSERT INTO `notes` (`user_id`, `title`, `body`) VALUES ($user_id, \"$title\", \"$body\")";
        $this->db->query($sql);
    }

    public function delete($note_id) {
        $this->db->query("DELETE FROM notes WHERE id = '$note_id';");
    }
}