<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/geolocation.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="panel.php">Panel<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="geolocation.php">Lokalizacja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="event.php">Wydarzenie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Wyloguj się</a>
        </li>
      </ul>
  </nav>
  <main>
    <div class="main-container">
  <?php if (isset($_SESSION['success'])) : ?>
  <h1>Wybierz id wydarzenia</h1>
  <?php
  // initializing variables
  $servername = "localhost";
  $username = "c1_rybinski";
  $password = "oTCBwGx]bC5k4iP[6psW";
  $dbname = "c1_rybinski";
  $email    = "";
  $errors = array();

  // connect to the database
  $link = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  // Attempt select query execution
  $sql = "SELECT * FROM event";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        echo "<select id='event-id' class='form-control' name='id'>";
        while($row = mysqli_fetch_array($result)){
          echo "<option value='" . $row['id'] ."' data-lat='" .  $row['latitude'] . "' data-long='" .  $row['longitude'] ."'>". $row['id'] . "</option>";

        }
        echo "</select>";

          // Free result set
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }



  // Close connection
  mysqli_close($link);
  ?>
    <button class="btn btn-primary btn-lg btn-submit">Sprawdź położenie</button>
  </div>
</main>

<script>
const btnSubmit = document.querySelector(".btn-submit");
// let longitude = Number(document.querySelector(".longitude").textContent);


btnSubmit.addEventListener("click", ()=>{
  let eventId = document.querySelector("#event-id");
  let latitude = Number(eventId.options[eventId.selectedIndex].attributes[1].value);
  let longitude = Number(eventId.options[eventId.selectedIndex].attributes[2].value);
  window.open(`geolocation.html?latitude=${latitude}&longitude=${longitude}`, "_self");
})
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php endif ?>

</body>
</html>
