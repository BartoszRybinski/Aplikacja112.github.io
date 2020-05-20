const KEY = "82005d27a116c2880c8f0fcb866998a0";

const urlParams = new URLSearchParams(window.location.search);

const urlParam = urlParams.get('latitude');

const urlParam2 = urlParams.get('longitude');



let latitude = parseFloat(urlParam);

let longitude = parseFloat(urlParam2);



let map;

function initMap() {
myLatlng = {lat: latitude, lng: longitude};
map = new google.maps.Map(document.getElementById('map'), {

  center: {lat: latitude, lng: longitude},

  zoom: 18

});
var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  title: 'Click to zoom',
  icon: {
    url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
  }
});
}

console.log(latitude);
console.log(longitude);
