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
        print_r($n_crud->read_all($id));
        ?>
</body>
</html>