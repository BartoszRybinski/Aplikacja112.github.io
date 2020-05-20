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
      <li class="nav-panel">Panel</li>
      <li class="drop-menu">Ustawienia</li>
      <li class="drop-menu">Wyloguj się</li>

    </ul>
  </nav>
</header>
<main>
<h1>Odpowiednie służby zostały poinformowane</h1>
</main>
<?php endif ?>
<script src="js/app.js"></script>
</body>
</html>
