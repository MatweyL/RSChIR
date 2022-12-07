<div class="mt-3">
    <h2>Заметки</h2>
    <div class="mt-3">
        <?php
        foreach ($notes as $note) {
            echo "<div class='card mt-2'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $note[1] . "</h5>
                                    <p class='card-text'>" . $note[2] . "</p>
                                    <div class=''>
                                    <form method='GET' action='/note/update' class='d-inline'><input type='number' name='note_id' value='" . $note[0] . "' hidden><button class='btn btn-outline-success' type='submit'>Редактировать</button></form>
                                    <form method='POST' action='/note/delete' class='d-inline'><input type='number' name='note_id' value='" . $note[0] . "' hidden><button class='btn btn-outline-danger' type='submit'>Удалить</button></form>
                                    
                                    </div>
                                </div>
                              </div>                                ";

        }
        ?>
    </div>
    <div class='mt-3'>
    </div>
</div>
<!--<form` method='GET' action='/delete' class='d-inline'><input type='number' name='id' value='" . $note[0] . "' hidden><button class='btn btn-outline-danger' type='submit'>Удалить</button></form>-->
