
// Interval timer and cookies
function btnCancelOn () {
  btnSubmit.style.display = "none";
  btnCancel.style.display = "flex";
  intervalStatus.textContent = "włączony";
  intervalStatus.style.color = "lightgreen";
}

function btnCancelOff() {
  btnCancel.style.display = "none";
  intervalStatus.textContent = "wyłączony";
  intervalStatus.style.color = "darkred";
}

let data = new Date();
let endHours = localStorage['dateHours'] || 'defaultValue';
let endMinutes = localStorage['dateMinutes'] || 'defaultValue';
let endSeconds = localStorage['dateSeconds'] || 'defaultValue';
let intervalStatus = document.querySelector(".interval-status");
let data1 = new Date(2020,5,20,data.getHours(),data.getMinutes(),data.getSeconds());
let data2 = new Date(2020,5,20,endHours,endMinutes,endSeconds);
let btnSubmit = document.querySelector(".btn-submit");
let btnCancel = document.querySelector(".btn-cancel");
console.log(data1);
console.log(data2);
//Set time to cache variable
btnSubmit.addEventListener("click", ()=>{
  let btnInterval = document.querySelector(".btn-interval-time").textContent;
  let date = new Date();
  data1 = new Date(2020,5,20,date.getHours(),date.getMinutes(),date.getSeconds());
  data2 = new Date(2020,5,20,date.getHours()+parseInt(btnInterval),date.getMinutes(),date.getSeconds());
  localStorage['dateHours'] = date.getHours() + parseInt(btnInterval);
  localStorage['dateMinutes'] = date.getMinutes();
  localStorage['dateSeconds'] = date.getSeconds();
  localStorage['intervalOn'] = true;
  // localStorage['Date'] = date.
  // btnSubmit.disabled = "true";
  btnCancelOn();
  console.log(data1);
  console.log(data2);
  showTime((data2-data1)/1000)

})
function success(pos) {
let coords = pos.coords;
// window.open(`http://www.rybinski.dev.minda.pl/App/authorities-form.php?latitude=${coords.latitude}&longitude=${coords.longitude}&accuracy=${coords.accuracy}`);
window.location.href = `http://www.rybinski.dev.minda.pl/App/authorities-form.php?latitude=${coords.latitude}&longitude=${coords.longitude}&accuracy=${coords.accuracy}`;
console.log("Działa");
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


function showTime(time) {
  let spanTime = document.querySelector(".interval-time");
  let timeInMinutes;
  function interval() {
    spanTime.style.display = "flex";
    spanTime.textContent = `${Math.floor(time / 3600)}h ${Math.floor((time / 60)%60)}min ${Math.floor(time%60)}sec`
    time--;
    btnCancel.addEventListener("click", ()=>{
      btnSubmit.style.display = "flex";
      spanTime.style.display = "none";
      localStorage['intervalOn'] = false;
      btnCancelOff();
      clearInterval(timer);
      })
    if(time <0) {
      // btnSubmit.disabled = "false";
      localStorage['intervalOn'] = false;
      intervalStatus.textContent = "wyłączony";
      intervalStatus.style.color = "darkred";
      clearInterval(timer);
      getLocation();
    }
  }
  let timer = setInterval(interval, 1000);
}

let checkInterval = localStorage['intervalOn'];

{
  if(checkInterval == 'true') {
    showTime((data2-data1)/1000)
    btnCancelOn();
  }
  if(checkInterval == 'false') {
    btnCancelOff();
  }
}
