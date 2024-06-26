<?php
session_start();
$log = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['loginEmail'];
  $pass = $_POST['loginPassword'];
  $recaptcha_response = $_POST['g-recaptcha-response'];

  
  // Подключение к базе данных - замените параметры соединения на актуальные
  $db = mysqli_connect('localhost', 'root', '', 'Pretty');

  // Используйте подготовленные запросы для защиты от SQL-инъекций
  $query = "SELECT id, email, pass, name FROM users WHERE email = ? AND pass = ?";
  
  $stmt = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['loginEmail'] = $email;
    $_SESSION['loginPassword'] = $pass;
    $_SESSION['name'] = $user['name'];
    $_SESSION['id'] = $user['id'];
    $log = 1;
    $_SESSION['auth'] = true;
    echo "<script>alert('OK')</script>"; 
    // Перенаправление на страницу профиля пользователя:
    header('Location: http://localhost:5173/profile.php');
  } else {
    echo "<script>alert('Неправильный email или пароль')</script>";
  }
  
}
