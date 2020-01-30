@extends('layouts.app')

@section('content')
     <div id="mapid" style="width: 1100px; height: 550px;"></div>

    <script>
        var mymap = L.map('mapid').setView([0.347596,32.582520], 8);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGFsaWhpbGxhcnkiLCJhIjoiY2s1c2ZhYnp1MDF2NDNsbDd0bTNjM3RzNCJ9._wzQ6YFFVtt5c_KAbsd1XA', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoiZGFsaWhpbGxhcnkiLCJhIjoiY2s1c2ZhYnp1MDF2NDNsbDd0bTNjM3RzNCJ9._wzQ6YFFVtt5c_KAbsd1XA'
    }).addTo(mymap);


    axios.get('{{ url('/api/reports') }}')
      .then(function (response) {
        console.log(response.data);
        L.geoJSON(response.data, {

            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {icon:L.icon({iconUrl: feature.properties.iconx,
                                                    iconSize:     [30, 50], // size of the icon
                                                    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                                                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                                                        })});
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(mymap);
    })
    .catch(function (error) {
        console.log(error);
    });


    </script>

    {{-- @foreach ($activeCrimes as $crime)
        <script>
            counter = counter+1;
            var Icon = L.icon({
            @if($crime->category == "RAPE")
                iconUrl: 'https://www.freeiconspng.com/uploads/google-location-icon-7.png',

            @elseif($crime->category == "OTHERS")
                iconUrl: 'https://www.freeiconspng.com/uploads/green-location-icons-17.png',

            @elseif($crime->category == "MURDER")
                iconUrl: 'https://www.freeiconspng.com/uploads/red-location-icon-1.png',

            @else
                iconUrl: 'https://www.freeiconspng.com/uploads/blue-location-icon-png-19.png',

            @endif
            iconSize:     [38, 60], // size of the icon
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            var marker = "marker"+counter;
            marker = L.marker([{{ $crime->location }}], {icon: Icon}).addTo(mymap);

            marker.bindPopup("<b>"+{{$crime->location}}+"</b>").openPopup();

        </script>
    @endforeach --}}


@endsection

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>

<!--AXio json loader -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
