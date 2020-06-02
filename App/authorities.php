<?php
// initializing variables
$servername = "localhost";
$username = "c1_rybinski";
$password = "oTCBwGx]bC5k4iP[6psW";
$dbname = "c1_rybinski";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, 'c1_rybinski', $password, $dbname);

if (isset($_POST['reg_details'])) {
  // receive all input values from the form
  $formUsername = mysqli_real_escape_string($db, $_POST['formUsername']);
  $formLatitude = mysqli_real_escape_string($db, $_POST['formLatitude']);
  $formLongitude= mysqli_real_escape_string($db, $_POST['formLongitude']);
  $formAccuracy = mysqli_real_escape_string($db, $_POST['formAccuracy']);
  $formImage = mysqli_real_escape_string($db, $_POST['formImage']);
  $today = date("Y-m-d, H:i:s");


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  // Insert data
  if (count($errors) == 0) {

  	$query = "INSERT INTO event (username,latitude, longitude, accuracy, accident, checked, eventdate, image)
  			  VALUES('$formUsername', '$formLatitude', '$formLongitude', '$formAccuracy', 'brak odpowiedzi interwal', '0', '$today', '$formImage')";
  	mysqli_query($db, $query);
    $query2 = "UPDATE `event` SET `checked`= 1 WHERE id = $selectId";
    mysqli_query($db, $query2);
  	$_SESSION['username'] = $formUsername;
  	$_SESSION['success'] = "Jesteś teraz zalogowany";
  	header('location: app.php');
  }
}

// ...
 ?>
