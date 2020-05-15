<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: sign-in.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
  }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aplikacja112</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<?php if (isset($_SESSION['success'])) : ?>
<body>
<header>
  <nav>
    <a href="index.html"><img src="img/logo.svg" alt="Logo karetki jadącej na sygnale"></a>
    <ul class="nav-ul">
      <li class="nav-user"><?php echo $_SESSION['username']; ?></li>
      <li class="drop-menu">Ustawienia</li>
      <li class="drop-menu">Wyloguj się</li>

    </ul>
  </nav>
</header>
<main>
<div class="main-container">
  <div class="main-content">
    <h1>Aplikacja 112</h1>
    <span>Interwał <span class="app-interval">włączony</span></span>
    <span>Zgłoś się za: 2h 23min</span>
  </div>
  <div class="main-app">
    <div class="main-app-container">
      <div class="main-app-wrap">
        <a href="interval.php"></a>
        <img src="img/bell-icon.svg" alt="Ikona dzwonka">
        <span>Interwał</span>
      </div>
      <div class="main-app-wrap accident">
        <a href="accident.php"></a>
        <img src="img/car-icon.svg" alt="Ikona samochodu">
        <span>Zgłoś Stłuczkę</span>
      </div>
    </div>
    <div class="main-app-container">
      <div class="main-app-wrap">
        <a href="hospital.php"></a>
        <img src="img/hospital-icon.svg" alt="Ikona szpitala">
        <span>Znajdź Szpital</span>
      </div>
      <div class="main-app-wrap">
        <a href="http://www.rybinski.dev.minda.pl/MusicApp/error.html"></a>
        <img src="img/speech-icon.svg" alt="Ikona rozmowy">
        <span>Blog o zdrowiu</span>
      </div>
    </div>
  </div>
  <div class="btn-container">
    <!-- <a href="tel:666-666-666"></a> -->
     <a href="http://www.rybinski.dev.minda.pl/MusicApp/error.html"></a>
      <div class="btn-call">
        <span>Zadzwoń po pomoc</span>
      </div>
      <div class="btn-icon">
        <img src="img/phone-icon.svg" alt="Ikona słuchawki od telefonu">
      </div>
    </div>
</div>
</main>
<?php endif ?>
<script src="js/app.js"></script>
</body>
</html>
