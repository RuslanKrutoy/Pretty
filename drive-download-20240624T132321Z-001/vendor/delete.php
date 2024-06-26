<?php

//Удаление пользователя

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы users
 */

mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');