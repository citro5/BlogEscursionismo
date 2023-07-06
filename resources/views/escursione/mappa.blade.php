
@extends('layouts.master') 

@section('titolo')
Mappa
@endsection

@section('stile','style.css') 

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mappa</li>
  </ol>
</nav>
@endsection

@section('corpo')
<div id="map"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
// Inizializza la mappa
var map = L.map('map').setView([46.153524, 10.470016], 11);

// Aggiungi il layer della mappa (puoi utilizzare diversi provider come OpenStreetMap o Mapbox)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Mappa di OpenStreetMap',
  maxZoom: 18
}).addTo(map);

// Crea un array di waypoint con i titoli delle escursioni
var waypoints = [
  { title: 'Monte Adamello', lat: 46.156188,  lon: 10.496503, id:1 },
  { title: 'Cima Plem', lat: 46.151729,  lon: 10.463009, id:2 },
  { title: 'Monte Aviolo', lat: 46.184884,  lon: 10.398413, id:3 },
  { title: 'Pizzo Badile Camuno', lat: 46.004699, lon: 10.402035, id:4 },
];

// Aggiungi i waypoint alla mappa
waypoints.forEach(function(waypoint) {
  var marker= L.marker([waypoint.lat, waypoint.lon]).addTo(map).bindPopup('<a href="/escursione/info/' + encodeURIComponent(waypoint.id) + '">'+ waypoint.title+'</a>');
 

});


</script>

<script>

    </script>

@endsection