<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous">
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
            <h2>Заметки</h2>
            <div class="mt-3">
                <form enctype="multipart/form-data" action="loader.php" method="POST">
                    <div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
                    <br>
                    <label class="custom-file-label" for="file_field">Отправить этот файл:</label>
                    <br>
                    <input class="custom-file-input" id="file_field" name="userfile" type="file"/>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Отправить файл"/>
                </form>

                <div class='mt-3'>
                    <?php
                    include_once "../utils.php";
                    $files = scandir('./pdf');
                    if (count($files) <= 2) {
                        echo "<h2>Нет загруженных файлов</h2>";
                    } else {
                        echo "<h2>Загруженные файлы</h2>";
                        foreach ($files as $file) {
                            if ($file != "." and $file != "..") {
                                echo "<div class='card'><a class='card-body' href='./pdf/".$file."'>".$file."</a></div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>