const KEY = "82005d27a116c2880c8f0fcb866998a0";

const urlParams = new URLSearchParams(window.location.search);

const urlParam = urlParams.get('latitude');

const urlParam2 = urlParams.get('longitude');



let latitude = parseFloat(urlParam);

let longitude = parseFloat(urlParam2);



let map;

function initMap() {

map = new google.maps.Map(document.getElementById('map'), {

  center: {lat: latitude, lng: longitude},

  zoom: 18

});

}

console.log(latitude);
console.log(longitude);

