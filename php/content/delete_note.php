<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["note_id"]) && !empty($_POST["note_id"])) {
    include_once "utils.php";
    $n_crud = notes_crud();
    $note_id = trim($_POST["note_id"]);
    $user_id = get_current_user_id();
    $n_crud->delete($note_id, $user_id);
    redirect("/user/notes.php");
}
?>