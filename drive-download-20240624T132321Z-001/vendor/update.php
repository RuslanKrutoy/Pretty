<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

 $name = $_POST['name'];
 $surname = $_POST['surname'];
 $email = $_POST['email'];
 $pass = $_POST['pass'];
 $phone = $_POST['phone'];
 $date = $_POST['date'];

/*
 * Делаем запрос на изменение строки в таблице users
 */

mysqli_query($connect, "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `email` = '$email' , `pass` = '$pass' , `phone` = '$phone' , `date` = '$date' WHERE `users`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

 header('Location: /' );