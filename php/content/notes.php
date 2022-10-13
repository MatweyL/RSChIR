<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eee it works</h1>
        <?php
        
        include_once "utils.php";
        $id = get_current_user_id();
        $n_crud = notes_crud();
        foreach ($n_crud->read_all($id) as $note) {
            echo "<div>$note[0] $note[1] $note[2] $note[3]</div>";
            echo "<a href='update_note.php?note_id=$note[0]'>Редактировать</a>";
            echo "<form method='POST' action='delete_note.php'><input type='number' name='note_id' value='$note[0]' hidden><button type='submit'>Удалить</button></form>";
        }

        ?>
        
</body>
</html>