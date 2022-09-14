<html lang="en">
<head>
<title>Вторая практическая работа по РСЧИР</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<main class="container">
    <div class="mt-3"><h1>Задание 3</h1></div>
    <div class="mt-3"><div class="text-muted">Вывод информации о сервере</div></div>
    <div class="mt-3">
    <form  method="GET">
            <div class="form-group">
                <select name="command">
                    <option selected>ls</option>
                    <option>pwd</option>
                    <option>whoami</option>
                    <option>ps</option>
                    <option>id</option>
                </select>                
            </div>
            <button type="submit" class="btn btn-primary">Выполнить</button>
        </form>
    </div>
<div class="">
    <?php
        include_once 'commands.php';
        if  (array_key_exists('command', $_GET)) {
            print_r(get_command_result($_GET['command']));
        } else {
            echo "no";
        }
    ?>
</div>
</main>
</body>
</html>