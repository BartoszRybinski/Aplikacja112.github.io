<?php
session_start();

// initializing variables
$servername = "localhost";
$username = "c1_rybinski";
$password = "oTCBwGx]bC5k4iP[6psW";
$dbname = "c1_rybinski";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Nazwa użytkownika jest wymagana"); }
  if (empty($email)) { array_push($errors, "Email jest wymagany"); }
  if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Hasła się nie zgadzają");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Taka nazwa użytkownika już istnieje");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Taki email już istnieje");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Jesteś teraz zalogowany";
  	header('location: index.html');
  }
}

// ...



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Nazwa użytkownika jest wymagana");
  }
  if (empty($password)) {
  	array_push($errors, "Hasło jest wymagane");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Jesteś teraz zalogowany";
  	  header('location: panel.php');
  	}else {
  		array_push($errors, "Zła nazwa użytkownika lub hasło");
  	}
  }
}

?>
