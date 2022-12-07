<div class="mt-3">
    <h2>Статистика</h2>
    <div class="mt-3">
    <?php
    foreach ($data[0] as $image) {
        echo <<<A
            <img src=$image alt="graphic">
        A;
    }
    ?>
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
            foreach ($data[1] as $data_row) {
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