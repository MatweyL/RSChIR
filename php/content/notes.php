<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Notes - сервис заметок</title>
</head>
<body>
    <main class="container">
        <div class="mt-3">
            <h1>Notes - сервис ведения заметок</h1>
        </div>
        <hr>
        <nav class="navbar navbar-light justify-content-between">
            <a class="navbar-brand" href="/">Notes</a>
                <span class="nav-item">
                  <a class="nav-link" href="/destination.html">Назначение</a>
                </span>
                <span class="nav-item">
                  <a class="nav-link" href="/author.html">О создателе</a>
                </span>
                <span class="nav-item">
                  <a class="nav-link" href="/user/notes.php">Заметки</a>
                </span>
                <span class="nav-item">
                    <form class="form-inline" method="GET" action="/user/create_note.php">
                        <button class="btn btn-outline-success" type="submit">Создать</button>
                      </form>
                </span>
          </nav>
          <hr>
        <div class="mt-3">
            <h2>Заметки</h2>
            <div class="mt-3">
                <?php
                    include_once "utils.php";
                    $id = get_current_user_id();
                    $n_crud = notes_crud();
                    foreach ($n_crud->read_all($id) as $note) {
                        echo "<div class='card mt-2'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$note[1]</h5>
                                    <p class='card-text'>$note[2]</p>
                                    <div class=''>
                                    <form method='GET' action='update_note.php' class='d-inline'><input type='number' name='note_id' value='$note[0]' hidden><button class='btn btn-outline-success' type='submit'>Редактировать</button></form>
                                    <form` method='POST' action='delete_note.php' class='d-inline'><input type='number' name='note_id' value='$note[0]' hidden><button class='btn btn-outline-danger' type='submit'>Удалить</button></form>
                                    </div>
                                </div>
                              </div>
                                ";
                        
                    }
                ?>
            </div>
            <div class='mt-3'>
            </div>
        </div>
    </main>
</body>
</html>