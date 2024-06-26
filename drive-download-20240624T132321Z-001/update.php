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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
    <h3>Update Users</h3>
    <form action="vendor/update.php" method="post">
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
        <button type="submit">Update</button>
    </form>
</body>
</html>