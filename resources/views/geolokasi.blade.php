@extends('layouts.app')

@section('content')
<style>
            #mapid {
                aspect-ratio: 1/1;
                width: 100%;
                border-radius: 10px;
                z-index: 0;
            }
        </style>
    <body>
<section class="py-xl-5 mobile">
<div class="container mt-5">
    
    <!-- make 2 column, left column for attendace input and right column for table  -->
    <div class="row">
    <div class="col-lg-8">
    <div class="alert alert-danger" style="border-radius: 10px;">
                <h4>Jangan Lupa Mengaktifkan Lokasi/GPS ya!!</h4>
              </div>
 

                    <div class="border shadow-lg mb-5" id="mapid"></div>

        </div>
        <div class="col-lg-4">
        

                    <!-- fill the name field, and click submit button to add record 
                       the data will be send to process.php -->

                    <form method="post" action="process.php">
                        <label><b>Nama</b></label>
                        <input type="text" name="name" class="form-control mt-1" required readonly value="{{ Auth::user()->name }}">

                        <!-- latitude and longitude automatically filled when page loaded.
                        we use javascript for get latitude and longitude with device gps.
                        if latitude and longitude empty, form cannot be submitted.
                        You have to check whether the GPS is blocked or not
                        -->

                        <label class="mt-4"><b>Latitude</b></label>
                        <input type="text" name="latitude" class="form-control mt-1" required readonly
                            id="latitude">

                        <label class="mt-4"><b>Latitude</b></label>
                        <input type="text" name="longitude" class="form-control mt-1" required readonly
                            id="longitude">

                        <button class="btn btn-primary mt-4 mb-5 w-100" style="border-radius: 5px;" type="submit">Submit</button>
                    </form>
                </div>
            </div>

</div>
</section>
       
    
        <!-- bootstrap js library  -->

    
        <!-- leaflet js  -->
        <script
              src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
              integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
              crossorigin="">
            </script>
    
        <script>
            // javascript function to get longitude and latitude
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError );
                    navigator.geolocation.getCurrentPosition(showContainer);
                } else {
    
                    alert('Your device is not support!');
                }
            }
    
            // fill the latitude and longitude form with this function 
            function showPosition(data) {
    
                document.getElementById('latitude').value = data.coords.latitude
                document.getElementById('longitude').value = data.coords.longitude
            }
            function showContainer(position) {
                var mymap = L.map("mapid").setView(
                  [position.coords.latitude, position.coords.longitude],
                  13
                );
                L.tileLayer(
                  "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
                  {
                    maxZoom: 18,
                    attribution:
                      'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: "mapbox/streets-v11",
                    tileSize: 512,
                    zoomOffset: -1,
                    container: "mapid"
                  }
                ).addTo(mymap);
                L.marker([position.coords.latitude, position.coords.longitude])
                  .addTo(mymap)
                  .bindPopup("<b>Hai!</b><br />Ini adalah lokasi mu");
              }
            function showError(error) {
    
                let error_message = ''
    
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        error_message = "Tolong aktifkan lokasi/gps kamu!!"
                        break;
                    case error.POSITION_UNAVAILABLE:
                        error_message = "Lokasi tidak ditemukan!!"
                        break;
                    case error.TIMEOUT:
                        error_message = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        error_message = "An unknown error occurred."
                        break;
                }
    
                alert(error_message)
            }
            var mymap = ''
            function showMap(latitude, longitude) {
                if (mymap) {
                    mymap.remove();
                    mymap = undefined
                }
                mymap = L.map("mapid").setView(
                  [position.coords.latitude, position.coords.longitude],
                  13
                );
                L.tileLayer(
                  "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
                  {
                    maxZoom: 18,
                    attribution:
                      'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: "mapbox/streets-v11",
                    tileSize: 512,
                    zoomOffset: -1,
                  }
                ).addTo(mymap);
                //menambahkan marker letak posisi dengan lat dan lng yang telah didapat sebelumnya
                L.marker([position.coords.latitude, position.coords.longitude])
                  .addTo(mymap)
                  .bindPopup("Location");
            }
            getLocation()
        </script>
@endsection