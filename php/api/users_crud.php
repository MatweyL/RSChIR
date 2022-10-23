<?php
class UsersCRUD {
    private mysqli $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(string $login, string $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` (`login`, `password_hash`) VALUES (\"$login\", \"$password_hash\")";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно создана новая запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }

    }

    public function read(int $user_id) {
        $user = array();
        $stmt = db()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("d", $user_id);
        $stmt->execute();
        $stmt->bind_result($id, $login, $password_hash);

        /* fetch values */
        while ($stmt->fetch()) {
            $user = array($id, $login, $password_hash);
        }
        /* close statement */
        $stmt->close();
        return $user;
    }

    public function read_all() {
        $users = array();
        $stmt = db()->prepare("SELECT * FROM users;");
        $stmt->execute();
        $stmt->bind_result($id, $login, $password_hash);

        /* fetch values */
        while ($stmt->fetch()) {
            $users[] = array($id,$login, $password_hash);
        }
        /* close statement */
        $stmt->close();
        return $users;
    }

    public function update(int $user_id, string $login, string $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE `users` SET `login` =  \"$login\", `password_hash` = \"$password_hash\" WHERE `id` = $user_id";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно обновлена запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }
    }

    public function delete(int $user_id) {
        $sql = "DELETE FROM `users` WHERE `id` = $user_id";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно удалена запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }
    }

}

?>