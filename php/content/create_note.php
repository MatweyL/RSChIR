<?php
    require "session.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once "utils.php";
        $user_id = get_current_user_id();
        $n_crud = notes_crud();
        $title = trim($_POST["title"]);
        $body = trim($_POST["body"]);
        $n_crud->create($user_id, $title, $body);
        redirect("/user/show.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
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
                  <a class="nav-link" href="/user/pdf_loading/pdf_list.php">Хранилище PDF</a>
                </span>
                <span class="nav-item">
                    <form class="form-inline" method="GET" action="/user/create_note.php">
                        <button class="btn btn-outline-success" type="submit">Создать</button>
                      </form>
                </span>
          </nav>
          <hr>
        <div class="mt-3">
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="title_input">Заголовок</label>
                    <input type="text" name="title" class="form-control mt-3" id="title_input" aria-describedby="title_help" placeholder="Введите текст..." required>
                    <small id="title_help" class="form-text text-muted">Сформулируйте мысль кратко и чётко</small>
                </div>
                <div class="form-group mt-3">
                    <label for="text_area">Описание</label>
                    <textarea class="form-control" name="body" id="text_area" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
            </form>
        </div>
    
</main>
</body>
</html>