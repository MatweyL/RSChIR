<div class="mt-3">
    <form action="" method="POST">
        <input type="number" name="note_id" value="<?php echo $note[0]; ?>" hidden>
        <div class="form-group mt-3">
            <label for="title_input">Заголовок</label>
            <input type="text" name="title" class="form-control mt-3" id="title_input" aria-describedby="title_help" placeholder="Введите текст..." value="<?php echo $note[1]; ?>" required>
            <small id="title_help" class="form-text text-muted">Сформулируйте мысль кратко и чётко</small>
        </div>
        <div class="form-group mt-3">
            <label for="text_area">Описание</label>
            <textarea class="form-control" name="body" id="text_area" rows="3" required><?php echo $note[2]; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
</div>