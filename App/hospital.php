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
  <title>Search Hospital</title>
  <link rel="stylesheet" href="css/accident.css">
</head>
<?php if (isset($_SESSION['success'])) : ?>
<body>
<header>
  <nav>
    <a href="app.php"><img src="img/logo.svg" alt="Logo karetki jadącej na sygnale"></a>
    <ul class="nav-ul">
      <li class="nav-panel">Panel</li>
      <li class="drop-menu">Ustawienia</li>
      <li class="drop-menu">Wyloguj się</li>

    </ul>
  </nav>
</header>
  <main>
    <div class="main-container">
      <h1>Znajdź szpital</h1>
      <img src="img/hospital-icon-white.svg" alt="Ikona szpitala">
      <span>Potrzebujesz znaleźć najbliższy szpital w Twojej okolicy?
      Kliknij w przycisk, a my zrobimy to za Ciebie.
    </span>
        <a href="find-hospital.html">
          <button class="btn-submit">
            Znajdź szpital
          </button>
        </a>
    </div>
  </main>
  <script src="js/app.js"></script>
  <?php endif ?>
</body>
</html>
