


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/src/scss/profile-style.css">
</head>
<body>
<header>
        <div class="container">
            <nav class="main-menu">
                <div class="main-menu-box">
                <div id="burger-menu">
                  <span></span>
                </div>
                
                <div id="menu">
                    <ul>
                      <li><a class="burger-text" href="#">Главная</a></li>
                      <li><a class="burger-text" href="#">Контакты</a></li>
                      <li><a class="burger-text" href="#">Услуги</a></li>
                    </ul>
                </div>
                <a class="main-menu-box__link" href="index.html"><img class="main-menu-box__logo" src="./src/img/Group 5.svg" alt="logo"></a>
                <div class="main-menu-box__container">
                <a class="main-menu-box__btn" href="#">Записаться</a>
                <a class="login-btn" href="enter.html"><img class="main-menu__avatar" src="./src/img/Group.png" alt="avatar"></a>
              </div>
            </div>
            </nav>
        </div>
</header>
	<section class="info">
		<div class="container">
			<div class="info__content">
			<?php
session_start();

// Проверяем, аутентифицирован ли пользователь
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header('Location: login.php');
    exit;
}

// Подключение к базе данных
$db = mysqli_connect('localhost', 'root', '', 'Pretty');

// Проверяем, есть ли ID пользователя в сессии
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Получаем информацию о пользователе из базы данных
    
    $query = "SELECT name, surname, email, date, phone FROM users WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        // Отображаем информацию о пользователе
		echo "<div class='personal-cabinet'>";
		echo "<h1>Личный кабинет</h1>";
		echo "<p>Имя: " . htmlspecialchars($user['name']) . "</p>";
		echo "<p>Фамилия: " . htmlspecialchars($user['surname']) . "</p>";
		echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
		echo "<p>Дата рождения: " . htmlspecialchars($user['date']) . "</p>";
		echo "<p>Телефон: " . htmlspecialchars($user['phone']) . "</p>";
		echo "</div>";
    } else {
        echo "Пользователь не найден.";
    }
} else {
    header('Location: login.php');
    exit;
}

?>



			</div>
		</div>
	</section>
<footer>
        <!-- <div class="container"> -->
          <div class="footer">
            <a href="index.html"><img src="/src/img/Group 24.svg" alt="#"></a>
            <div class="footer__info">
              <p class="footer__info-text">COPYRIGHT © 2024 САЛОНЫ КРАСОТЫ Pretty</p>
              <p class="footer__info-text">г. Москва, Большая Новодмитровская ул., 36, Дизайн-завод “Flacon”</p>
            </div>
            <ul class="footer__info-box">
              <il class="footer__info-box-item"><a href="index.html" class="footer__info-box-btn">Акции</a></il>
              <il class="footer__info-box-item"><a href="contact.html" class="footer__info-box-btn">Контакты</a></il>
              <il class="footer__info-box-item"><a href="services.html" class="footer__info-box-btn">Услуги</a></il>
            </ul>
            <ul class="footer__info-box">
              <il class="footer__info-box-item"><a href="index.html" class="footer__info-box-btn">О нас</a></il>
              <il class="footer__info-box-item"><a href="index.html" class="footer__info-box-btn">Сертификаты</a></il>
              <il class="footer__info-box-item"><a href="index.html" class="footer__info-box-btn">Мастера</a></il>
            </ul>
            <ul class="footer__info-box">
              <li class="footer__info-box-item"><a href="/drive-download-20240624T132321Z-001/index.php" class="footer__info-box-btn1">Записаться</a></li>
              <div class="footer__info-box1">
                <li class="footer__info-box-item"><img class="footer__info-img" src="/src/img/ri_vk-fill.png" alt="#"></li>
                <li class="footer__info-box-item"><img class="footer__info-img" src="/src/img/mdi_youtube.png" alt="#"></li>
              </div>
            </ul>
          </div>
        </div>
      </footer>
	  <script type="module" src="/Pretty/src/js/main.js"> </script>
	  <script  src="./src/js/burger.js"> </script>
</body>
</html>
