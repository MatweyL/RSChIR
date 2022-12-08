<?php

namespace mvc\models;

use mvc\core\Model;
use PDO;
use yii\db\Query;

class User extends Model {

    public function get_all_api() {
        return $this->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_api($user_id) {
        return $this->db->query("SELECT * FROM users WHERE id = '$user_id';")->fetch(PDO::FETCH_ASSOC);
    }

    public function create($login, $password_hash) {
        $this->db->query("INSERT INTO `users` (`login`, `password_hash`) VALUES (\"$login\", \"$password_hash\")");
    }

    public function update($user_id, $login, $password_hash) {
        if ($user_id != 1) {
            $this->db->query("UPDATE `users` SET `login` =  \"$login\", `password_hash` = \"$password_hash\" WHERE `id` = '$user_id'");
            return "ok";
        }
        return "root user is immutable";
    }

    public function delete($user_id) {
        if ($user_id != 1) {
            $this->db->query("DELETE FROM `users` WHERE `id` = '$user_id'");
            return "ok";
        }
        return "root user is immutable";
    }

}