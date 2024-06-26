<?php

//Добавление нового клиента


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
 * Делаем запрос на добавление новой строки в таблицу users
 */

mysqli_query($connect,"INSERT INTO `users` (`id`, `name`, `surname`, `email`, `pass`, `phone`, `date`) VALUES (NULL, '$name', '$surname', '$email', '$pass', '$phone', '$date')");

/*
 * Переадресация на главную страницу
 */

header('Location: /');