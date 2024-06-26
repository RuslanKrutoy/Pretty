<?php

//Добавление комментария

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$masters = $_POST['masters'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];

/*
 * Делаем запрос на добавление новой строки в таблицу record
 */

mysqli_query($connect, "INSERT INTO `record` (`id`, `id_users`, `masters`, `service` , `date` , `time`) VALUES (NULL, '$id', '$masters' , '$service', '$date', '$time')");

header('Location: /' );