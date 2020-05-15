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
<?php include('description.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/event.css">
</head>
<body>
  <?php if (isset($_SESSION['success'])) : ?>
  <header>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="panel.php">Panel<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="geolocation.php">Lokalizacja</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="event.php">Wydarzenie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">Historia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Wyloguj się</a>
          </li>
        </ul>
    </nav>
  </header>
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
  $sql = "SELECT * FROM event WHERE checked = 0";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table class='table table-striped'>";
              echo "<tr>";
                  echo "<th>#</th>";
                  echo "<th>Nazwa użytkownika</th>";
                  echo "<th>Latitude</th>";
                  echo "<th>Longitude</th>";
                  echo "<th>Dokładność</th>";
                  echo "<th>Rodzaj zdarzenia</th>";
                  echo "<th>Data</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
            $color = ($row['checked'] == '1') ? "lightgreen" : "red";
              echo "<tr style='background-color: " . $color . "'>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['longitude'] . "</td>";
                  echo "<td>" . $row['latitude'] . "</td>";
                  echo "<td>" . $row['accuracy'] . "</td>";
                  echo "<td>" . $row['accident'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
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
<main>
  <div class="main-container">
    <h1>Uzupełnij dane</h1>
    <form class="" action="event.php" method="post">
      <div class="form-group">
        <label for="exampleFormControlInput1">Wybierz numer sprawy</label>
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
        $sql = "SELECT * FROM event WHERE checked = 0";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
              echo "<select id='event-id' class='form-control' name='selectId'>";
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
      </div>
      <div class="form-group">
        <label for="FormControlSelect">Wybierz służby, które zostaną zaangażowane</label>
        <select multiple class="form-control form-control-services" name="selectServices" id="FormControlSelect">
          <option>Karetka S</option>
          <option>Karetka P</option>
          <option>Karetka T</option>
          <option>Karetka N</option>
          <option>Radiowóz</option>
          <option>Służby AT</option>
          <option>Wóz gaśniczy</option>
          <option>Ekipa gaśnicza</option>
          <option>Straż miejska</option>
          <option>Pogotowie gazowe</option>
          <option>Pogotowie energetyczne</option>
          <option>Pogotowie wodociągowe</option>
          <option>Inne</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Opisz sytuację</label>
        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-submit" name="reg_details">Wyślij zgłoszenie</button>
  </div>
</form>
</main>
  <?php endif ?>
</body>
</html>
