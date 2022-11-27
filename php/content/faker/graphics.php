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
                  <a class="nav-link" href="/user/adaptive/page.php">Адаптивная страница</a>
                </span>
                <span class="nav-item">
                  <a class="nav-link" href="/user/faker/graphics.php">Статистика</a>
                </span>
                <span class="nav-item">
                    <form class="form-inline" method="GET" action="/user/create_note.php">
                        <button class="btn btn-outline-success" type="submit">Создать</button>
                      </form>
                </span>
          </nav>
          <hr>
        <div class="mt-3">
            <h2>Статистика</h2>
            <div class="mt-3">
                <?php
                    require_once "generator.php";

                    generate_data();
                    
                    require_once "simple_pie_plot.php";
                    require_once "plot_bar.php";
                    require_once "line_plot.php";
                    
                    draw_plot_pie();
                    draw_plot_bar();
                    draw_plot_scatter();
                    require_once "watermark.php";

                    $images = array("images/plot_pie.png", "images/plot_bar.png", "images/line_plot.png");

                    foreach ($images as $image) {
                        add_watermark($image);
                    }
                ?>
                <img src="images/plot_pie.png" alt="plot_1.png">
                <img src="images/plot_bar.png" alt="plot_2.png">
                <img src="images/line_plot.png" alt="plot_3.png">
            </div>
            <div class="mt-3">
                <table class="table">
                    <tr>
                        <th>Имя</th>
                        <th>Телефонный номер</th>
                        <th>Компания</th>
                        <th>Устройство</th>
                        <th>Возраст</th>
                        <th>День недели</th>
                        <th>Метрика</th>
                    </tr>
                    <?php
                    $data = get_raw_data();

                    foreach ($data as $data_row) {
                        echo "<tr>";
                        echo "<td>".$data_row->name."</td>";
                        echo "<td>".$data_row->phone_number."</td>";
                        echo "<td>".$data_row->company."</td>";
                        echo "<td>".$data_row->user_agent."</td>";
                        echo "<td>".$data_row->age."</td>";
                        echo "<td>".$data_row->day_of_week."</td>";
                        echo "<td>".$data_row->number."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>