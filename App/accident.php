<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Accident</title>
  <link rel="stylesheet" href="css/accident.css">
</head>
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
    <div class="main-container">
      <h1>Zgłoś zdarzenie</h1>
      <img src="img/car-icon-white.svg" alt="Ikona samochodu">
      <span>Jeżeli brałeś udział w zdarzeniu i potrzebujesz
        pomocy służb, wyślij zgłoszenie, a my znajdziemy Cie
        po lokalizacji urządzenia</span>
          <button class="btn-submit">
            Zgłoś zdarzenie
          </button>
    </div>
  </main>
  <script src="js/app.js"></script>
  <script type="text/javascript">
  let btnSubmit = document.querySelector(".btn-submit");
  function success(pos) {
let coords = pos.coords;
window.open(`http://www.rybinski.dev.minda.pl/App/accident-form.php?latitude=${coords.latitude}&longitude=${coords.longitude}&accuracy=${coords.accuracy}`);

}


function getLocation() {
try{
  if(`geolocation` in navigator) {
    navigator.geolocation.getCurrentPosition(success);

  } else {
    error();
  }
} catch(err) {
  document.write(`Catch Błąd ${err.message}`);
}
}

btnSubmit.addEventListener("click", ()=>{
  getLocation();
})
  </script>
</body>
</html>
