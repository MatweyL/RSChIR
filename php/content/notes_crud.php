<?php
class NotesCRUD {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($user_id, $title, $body) {
        $stmt = db()->prepare("INSERT INTO notes (user_id, title, body) VALUES (:user_id, :title, :body)");
        $stmt->bind_param(':user_id', $user_id);
        $stmt->bind_param(':title', $title);
        $stmt->bind_param(':body', $body);
        $stmt->execute();
        $stmt->close();
    }

    public function read() {
        
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

    public function update() {
        
    }

    public function delete() {
        
    }

}

?>