<html lang="en">
<head>
<title>Вторая практическая работа по РСЧИР</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<!-- 

Кодирование фигуры:
Форма (2 бита): 
1. Круг (00)
2. Квадрат (01)
3. Прямоугольник (10)
4. Треугольник (11)

Цвет (6 бита)
1. Первые 2 бита - количество красного
2. Вторые 2 бита - количество зеленого
3. Третьи 2 бита - количество синего
Пояснение:
00 = 0
01 = 85
10 = 170
11 = 255

Размер (8 бит):
1. Первые 4 бита - ширина
2. Вторые 4 бита - высота
 -->
<main class="container">
    <div class="mt-3"><h1>Задание 1</h1></div>
    <div class="mt-3">
        <form  method="GET">
            <div class="form-group">
                <label for="shape_data_input">Параметры фигуры</label>
                <input type="number" class="form-control" name="shape_data" id="shape_data_input" aria-describedby="shape_data_input_help" size="16" min="0" placeholder="Введите число" required>
                <small id="shape_data_input_help" class="form-text text-muted">
                    <ul>
                        <li>Первые 2 бита - фигура</li>
                        <li>Вторые 6 бит - цвет фигуры</li>
                        <li>Третьи 8 бит - размер фигуры</li>
                    </ul>
                </small>
                <button type="submit" class="btn btn-primary">Сгенерировать</button>
            </div>
        </form>
    </div>

</main>
</body>
</html>