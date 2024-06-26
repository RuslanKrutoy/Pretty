<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Почта</th>
            <th>Телефона</th>
            <th>Дата рождения</th>
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

            $pretty = mysqli_query($connect, "SELECT * FROM `users`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $pretty = mysqli_fetch_all($pretty);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             */

            foreach ($pretty as $pretty) {
                ?>
                    <tr>
                        <td><?= $pretty[0] ?></td>
                        <td><?= $pretty[1] ?></td>
                        <td><?= $pretty[2] ?></td>
                        <td><?= $pretty[3] ?></td>
                        <td><?= $pretty[5] ?></td>
                        <td><?= $pretty[6] ?></td>
                        <td><?= $pretty[7] ?></td>
                        <td><a href="product.php?id=<?= $pretty[0] ?>">Record</a></td>
                        <td><a href="update.php?id=<?= $pretty[0] ?>">Update</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $pretty[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <h3>Add new user</h3>
    <form action="vendor/create.php" method="post">
        <p>Имя</p>
        <input type="text" name="name">
        <p>Фамиилия</p>
        <input name="surname">
        <p>Почта</p>
        <input type="text" name="email">
        <p>Пароль</p>
        <input type="text" name="pass">
        <p>Телефон</p>
        <input type="text" name="phone">
        <p>Дата рождения</p>
        <input type="date" name="date"> <br> <br>
        <button type="submit">добавить нового пользователя</button>
    </form>


    <h3>Запросы для записи</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Телефон</th>
        </tr>
    <?php

$pretty = mysqli_query($connect, "SELECT * FROM `requests`");

$pretty = mysqli_fetch_all($pretty);

foreach ($pretty as $pretty) {
    ?>
    
    <ul>
        <tr>
        
            <td><?= $pretty[0] ?></td>
            <td><?= $pretty[1] ?></td>
            <td><?= $pretty[2] ?></td>
        </tr>
        </ul>
    <?php
}
?>
</table>
</body>
</html>




