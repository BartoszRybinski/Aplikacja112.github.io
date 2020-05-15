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
  <title>Car accident</title>
  <link rel="stylesheet" href="css/car.css">
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
      <h1>Interwał</h1>
      <span class="interval-status"></span>
      <span class="interval-time"></span>
      <img src="img/bell-icon-white.svg" alt="Ikona dzwonka">
      <span>Ustaw czas, po którym zostanie wysłane zgłoszenie, na które należy odpowiedzieć.
      Po trzykrotnym braku odpowiedzi odpowiednie służby zostaną poinformowane.</span>
      <div class="btn-interval">
        <div class="btn-interval-minus"></div>
        <div class="btn-time-container">
          <span class="btn-interval-time">1</span>
        </div>
        <div class="btn-interval-plus"></div>

      </div>
        <a href="">
          <button class="btn-submit">
            Ustaw czas
          </button>
        </a>
    </div>
  </main>
  <?php endif ?>
  <script src="js/interval.js"></script>
</body>
</html>
