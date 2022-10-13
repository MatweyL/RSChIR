<?php

include_once "notes_crud.php";

// Простой способ сделать глобально доступным подключение в БД
function db(): mysqli
{
    static $mysqli;

    if (!$mysqli) {
        $mysqli = new mysqli(getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("NAME"));
    }

    return $mysqli;
}


function notes_crud()
{
    static $n_crud;

    if (!$n_crud) {
        $n_crud = new NotesCRUD(db());
    }

    return $n_crud;
}


function flash(?string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['flash']?>
          </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function get_current_user_id(): int {
    $stmt = db()->prepare("SELECT id FROM users WHERE login = ?");
    $stmt->bind_param("s", $_SERVER['PHP_AUTH_USER']);
    $stmt->execute();
    $stmt->bind_result($current_user_id);
    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
    return $current_user_id;
}

?>