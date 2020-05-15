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
<?php include('accident-desc.php') ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Accident</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style media="screen">
    .form-username, .form-longitude, .form-latitude, .form-accuracy{
      pointer-events: none;
      background-color: lightgray;
    }
  </style>
</head>
<?php if (isset($_SESSION['success'])) : ?>
<body>
<main>
  <div class="main-container">
  <h1>Zgłoszenie stłuczki</h1>
    <form action="accident-form.php" method="post" class="accident-form">
      <div class="form-group">
        <label>Nazwa użytkownika</label>
        <?php echo "<input type='text' class='form-control form-username' placeholder='Nazwa użytkownika' name='formUsername' value='". $_SESSION['username']. "'>"; ?>
      </div>
      <div class="form-group">
        <label>Szerokość geograficzna</label>
        <input type="text" class="form-control form-latitude" placeholder="Szerokość geograficzna" name="formLatitude">
      </div>
      <div class="form-group">
        <label>Długość geograficzna</label>
        <input type="text" class="form-control form-longitude" placeholder="Długość geograficzna" name="formLongitude">
      </div>
      <div class="form-group">
        <label>Dokładność</label>
        <input type="number" class="form-control form-accuracy" placeholder="Dokładność" name="formAccuracy">
      </div>
      <div class="form-group">
        <label for="FormControlSelect">Wybierz służby, które zostaną zaangażowane</label>
        <select multiple class="form-control form-control-services" name="selectServices" id="FormControlSelect">
          <option>Stłuczka</option>
          <option>Wypadek Samochodowy</option>
          <option>Zasłabnięcie</option>
          <option>Pobicie</option>
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
      <button type="submit" class="btn btn-primary" name="reg_details">Wyślij zgłoszenie</button>
    </form>
  </div>
</main>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript">
  const urlParams = new URLSearchParams(window.location.search);
  const urlParam = urlParams.get('latitude');
  const urlParam2 = urlParams.get('longitude');
  const urlParam3 = urlParams.get('accuracy');


  let formLatitude = document.querySelector(".form-latitude");
  let formLongitude = document.querySelector(".form-longitude");
  let formAccuracy = document.querySelector(".form-accuracy");
  // let accidentForm = document.querySelector(".accident-form");
  formLatitude.value = urlParam;
  formLongitude.value = urlParam2;
  formAccuracy.value = urlParam3;
  // accidentForm.action = window.location.href;
  </script>
  <?php endif ?>
</body>
</html>
