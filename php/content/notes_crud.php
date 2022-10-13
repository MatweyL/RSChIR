<?php
class NotesCRUD {
    private mysqli $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(int $user_id, string $title, string $body) {
        $sql = "INSERT INTO `notes` (`user_id`, `title`, `body`) VALUES ($user_id, \"$title\", \"$body\")";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно создана новая запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }

    }

    public function read(int $note_id, int $user_id) {
        $note = array();
        $stmt = db()->prepare("SELECT id, title, body, creation_date FROM notes WHERE user_id = ? AND id = ?");
        $stmt->bind_param("dd", $user_id, $note_id);
        $stmt->execute();
        $stmt->bind_result($id, $title, $body, $creation_date);

        /* fetch values */
        while ($stmt->fetch()) {
            $note = array($id, $title, $body, $creation_date);
        }
        /* close statement */
        $stmt->close();
        return $note;
    }

    public function read_all($user_id) {
        $notes = array();
        $stmt = db()->prepare("SELECT id, title, body, creation_date FROM notes WHERE user_id = ?");
        $stmt->bind_param("d", $user_id);
        $stmt->execute();
        $stmt->bind_result($id, $title, $body, $creation_date);

        /* fetch values */
        while ($stmt->fetch()) {
            $notes[] = array($id, $title, $body, $creation_date);
        }
        /* close statement */
        $stmt->close();
        return $notes;
    }

    public function update(int $note_id, int $user_id, string $title, string $body) {
        $sql = "UPDATE `notes` SET `title` =  \"$title\", `body` = \"$body\" WHERE `user_id` = $user_id AND `id` = $note_id";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно обновлена запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }
    }

    public function delete(int $note_id, int $user_id) {
        $sql = "DELETE FROM `notes` WHERE `user_id` = $user_id AND `id` = $note_id";
        if ($this->db->query($sql) === TRUE) {
            return "Успешно удалена запись";
         } else {
            return "Ошибка: " . $sql . "<br>" . $this->db->error;
         }
    }

}

?>