<?php
// initializing variables
$servername = "localhost";
$username = "c1_rybinski";
$password = "oTCBwGx]bC5k4iP[6psW";
$dbname = "c1_rybinski";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['reg_details'])) {
  // receive all input values from the form
  $formUsername = mysqli_real_escape_string($db, $_POST['formUsername']);
  $formLatitude = mysqli_real_escape_string($db, $_POST['formLatitude']);
  $formLongitude= mysqli_real_escape_string($db, $_POST['formLongitude']);
  $formAccuracy = mysqli_real_escape_string($db, $_POST['formAccuracy']);
  $seletService = mysqli_real_escape_string($db, $_POST['selectServices']);
  $today = date("Y-m-d, H:i:s");

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($seletService)) { array_push($errors, "Wybierz wydarzenie"); }

  // Insert data
  if (count($errors) == 0) {

  	$query = "INSERT INTO event (username,latitude, longitude, accuracy, accident, checked, eventdate, image)
  			  VALUES('$formUsername', '$formLatitude', '$formLongitude', '$formAccuracy', '$seletService', '0', '$today', '')";
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
