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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <?php if (isset($_SESSION['success'])) : ?>
    <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="panel.php">Panel<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="geolocation.php">Lokalizacja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="event.php">Wydarzenie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Wyloguj się</a>
            </li>
          </ul>
          <img src="" alt="">
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
    $sql = "SELECT * FROM event ORDER BY checked DESC";
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
                    echo "<td>" . $row['eventdate'] . "</td>";
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
    <?php endif ?>
  </body>
</html>
