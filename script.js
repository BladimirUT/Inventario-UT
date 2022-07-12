function iniciarMap(){
var coord = {lat:16.855329084777544, lng: -99.8503932027942};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}