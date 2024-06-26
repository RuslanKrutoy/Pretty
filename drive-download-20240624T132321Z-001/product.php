<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

     $id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $users = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $users = mysqli_fetch_assoc($users);

    /*
     * Делаем выборку всех строк комментариев с полученным ID продукта выше
     */

    $record = mysqli_query($connect, "SELECT * FROM `record` WHERE `id` = '$id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     */

    $record = mysqli_fetch_all($record);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Product</title>
</head>
<body>
    <h2>Имя: <?= $users['Name'] ?></h2>
    <h2>Фамилия: <?= $users['Surname'] ?></h2>
    <p>Почта: <?= $users['email'] ?></p>
    <p>Телефон: <?= $users['phone'] ?></p>
    <p>Дата рождения: <?= $users['date'] ?></p>

    <hr>

    <h3>Записать</h3>
    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $users['id'] ?>">
        <p>Мастер</p> <input name="masters"></input>
        <p>Услуга</p> <input name="service"></input>
        <input type="date" name="date">
        <input type="time" name="time"></input> <br><br>
        <button type="submit">Записать</button>
    </form>

    <hr>

    <h3>Записи</h3>
    <ul>
        <?php

            /*
             * Перебираем массив с комментариями и выводим
             */

            foreach ($record as $record) {
            ?>
                <li><?= $record[2] ?></li>
                <li><?= $record[3] ?></li>
                <li><?= $record[4] ?></li>
                <li><?= $record[5] ?></li>
            <?php
            }
        ?>
    </ul>
</body>
</html>