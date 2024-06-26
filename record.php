<?php

/*
 * Делаем константы для хранения данных о базе данных
 * HOST - адрес для подключения к БД
 * USER - логин для доступа к БД
 * PASSWORD - пароль для доступа к БД
 * DATABASE - название базы данных, к которой мы подключаемся
 */

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'Pretty');

/*
 * Подключаемся к базе данных с помощью функции mysqli_connect()
 */

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

/*
 * Делаем проверку соединения
 * Если есть ошибки, останавливаем код и выводим сообщение с ошибкой
 */

if (!$connect) {
    die('Error connect to database!');
}



/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

// $id = $_POST['id'];
$FIO = $_POST['FIO'];
$phone = $_POST['phone'];


/*
 * Делаем запрос на добавление новой строки в таблицу record
 */

 mysqli_query($connect, "INSERT INTO `requests` (`FIO`, `phone`) VALUES ('$FIO', '$phone')");



header('Location: /' );