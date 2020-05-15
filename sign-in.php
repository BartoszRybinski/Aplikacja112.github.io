<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Logowanie</title>
  <link rel="stylesheet" href="css/sign-in.css">
</head>
<body>
  <header>
    <nav>
      <a href="index.html"><img src="img/logo-white.svg" alt="Logo karetki jadącej na sygnale"></a>
      <ul>
        <a href="index.html"><li>Strona główna</li></a>
      </ul>
    </nav>
  </header>
  <main>
    <div class="main-container">
      <h1>Logowanie</h1>
      <form method ="post" action="sign-in.php">
        <?php include('errors.php'); ?>
        <input type="text" class="fa" placeholder="Nazwa użytkownika" name="username">
        <input type="password" class="fa" placeholder="Hasło" name="password">
        <button type="submit" class="btn-primary" name="login_user">Zaloguj się</button>
      </form>
    </div>
  </main>
</body>
</html>
