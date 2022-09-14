<html lang="en">
<head>
<title>Вторая практическая работа по РСЧИР</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<main class="container">
    <div class="mt-3"><h1>Задание 2</h1></div>
    <div class="mt-3"><div class="text-muted">Сортировка выбором (Вариант (16 - 1) % 5 + 1 = 4)</div></div>
    <div class="mt-3">
    <form  method="GET">
            <div class="form-group d-flex flex-column " id="array">
                
            </div>
            <button type="button" class="btn btn-secondary" id="add_field_button">Добавить число</button>
            <button type="submit" class="btn btn-primary">Отсортировать</button>
        </form>
    </div>
<div class="">
    <?php
        // include_once 'decoder.php';
        // include_once 'renderer.php';
        // $decoder = new ShapeParametersDecoder;
        // if  (array_key_exists('shape_data', $_GET)) {
        //     $shape_parameters =  $decoder->decode_parameters($_GET['shape_data']);
        //     $renderer = new ShapeRenderer(10);
        //     echo $renderer->get_svg_shape($shape_parameters);
        // }
    ?>
</div>
</main>
<script type="text/javascript">
	let array_form = document.getElementById("array");
	let add_button = document.getElementById("add_field_button");
	add_button.addEventListener("click", function () {
		let input_field = document.createElement("input");
		input_field.type = "number";
		input_field.name = "numbers[]";
        
		input_field.style.width = "100px";
        array_form.appendChild(input_field);
	});
</script>
</body>
</html>