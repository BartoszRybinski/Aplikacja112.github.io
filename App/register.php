<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rejestracja</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->
  <link rel="stylesheet" href="css/register.css">
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
      <h1>Rejestracja</h1>
      <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <input type="text" class="fa" placeholder="Nazwa użytkownika" name="username">
        <input type="email" class="fa" placeholder="E-mail" name="email">
        <input type="password" class="fa" placeholder="Hasło" name="password_1">
        <input type="password" class="fa" placeholder="Potwierdź hasło" name="password_2">
        <button type="submit" class="btn-primary" name="reg_user">Zarejestruj się</button>
      </form>
    </div>
  </main>
</body>
</html>
