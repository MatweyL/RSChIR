<?php
?>
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