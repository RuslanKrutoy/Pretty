<?php
session_start();
$db = mysqli_connect('localhost','root', '', 'Pretty' );



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$pass = $_POST['pass'];
$passwordConfirm = $_POST['passwordConfirm'];

$_SESSION ['name'] = $name;

if ($db == false){
    echo 'Ошибка подключения';
    exit;
}

$UserMail = mysqli_query ($db, "SELECT email from users where email = '$email' ");

if (empty($name) || empty($surname)  || empty($email) || empty($phone)  || empty($date)  || empty($pass) || empty($passwordConfirm)) {
    echo 'Заполните все поля';
    exit;
}
// $phone = preg_replace('/\D/', '', $phone);
// Проверка на правильное заполнение почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Неправильный формат электронной почты';
    exit;
}

// Проверка на запрещенные символы в пароле
if (preg_match('/[\'",\*,\[\],\{\}]/', $pass)) {
    echo "<p>Недопустимые символы в пароле</p>";
    exit;
}

if (mysqli_num_rows ($UserMail) > 0){ 
    echo "Такая почта уже занята";
    exit; 
} 


if ($pass == $passwordConfirm && strlen ($pass) > 6 ){ 

    $sqlInsert = "INSERT INTO users SET name = '$name', surname = '$surname',  email = '$email', phone = '$phone',  date = '$date',  pass = '$pass' "; 

    $result = mysqli_query($db, $sqlInsert);
    header ('Location: http://localhost:5173/src/pages/profile.php');
}
else{
    echo "Пароль меньше 6 символов или не совпадают.";
}
}

else{ 
    echo 'Не правильно заполнены поля'; 
    exit; 
} 
?>