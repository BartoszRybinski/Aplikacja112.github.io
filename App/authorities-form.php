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
<?php include('authorities.php') ?>
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
    .authorities-form{
      display: none;
    }
    #vid{
      display: none;
    }
  </style>
  <link rel="stylesheet" href="css/authorities.css">
</head>
<?php if (isset($_SESSION['success'])) : ?>
<body>
  <header>
  <nav>
    <a href="app.php"><img src="img/logo.svg" alt="Logo karetki jadącej na sygnale"></a>
    <ul class="nav-ul">
      <li class="nav-panel">Panel</li>
      <li class="drop-menu">Ustawienia</li>
      <li class="drop-menu">Wyloguj się</li>

    </ul>
  </nav>
</header>
<main>
  <video id="vid" autoplay></video>
    <h1>Odpowiednie służby zostały poinformowane. Za chwilę zostaniesz przekierowany do aplikacji.</h1>
    <form action="authorities-form.php" method="post" class="authorities-form">
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
        <input type="text" class="form-control form-accuracy" placeholder="Dokładność" name="formAccuracy">
      </div>
      <div class="form-group">
        <label>Dokładność</label>
        <input type="text" class="form-control form-image" placeholder="Zdjęcie" name="formImage">
      </div>
      <button type="submit" class="btn btn-primary" name="reg_details">Wyślij zgłoszenie</button>
    </form>
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
  let formImage = document.querySelector(".form-image");

  let btn = document.querySelector(".btn-primary");
  formLatitude.value = urlParam;
  formLongitude.value = urlParam2;
  formAccuracy.value = urlParam3;
  // accidentForm.action = window.location.href;
  // setTimeout(()=>{
  //   btn.click();
  // }, 4000)

  navigator.mediaDevices.getUserMedia({
      video: {
        width: {
          min: 360,
          max: 1280
        },
        height: {
          min: 640,
          max: 1920
        }
      }
    })
    .then(stream => {
      document.querySelector("#vid").srcObject = stream;
      setTimeout(()=>{
        let video = document.querySelector("#vid");
        let canvas = document.createElement('canvas');
        canvas.width = 800;
        canvas.height = 640;
        let ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        let dataURL = canvas.toDataURL('image/jpeg');
        formImage.value = dataURL;
        console.log(formImage);
      },1000)
      setTimeout(()=>{
        btn.click();
      }, 2000)
    })



  </script>
  <?php endif ?>
</body>
</html>
