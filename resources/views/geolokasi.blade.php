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
      <div class="row">
        <div class="col-lg-8">
          <div class="alert alert-danger" style="border-radius: 10px;">
            <h4>Jangan Lupa Mengaktifkan Lokasi/GPS ya!!</h4>
          </div>
          <div class="border shadow-lg mb-5" id="mapid"></div>
        </div>
        <div class="col-lg-4">
          <form method="post" action="{{ url('post') }}">
            @csrf @method('POST')
            <label><b>Nama *</b></label>
            <input type="text" name="name" class="form-control mt-1" required readonly value="{{ Auth::user()->name }}">
            <label class="mt-4"><b>Latitude *</b></label>
            <input type="text" name="latitude" class="form-control mt-1" required readonly id="latitude">
            <label class="mt-4"><b>Longitude *</b></label>
            <input type="text" name="longitude" class="form-control mt-1" required readonly id="longitude">
            <label class="mt-4"><b>Email *</b></label>
            <input type="text" name="email" class="form-control mt-1" required readonly id="email" value="{{ Auth::user()->email }}">
            <label class="mt-4"><b>status *</b></label>
            <input type="text" name="status" class="form-control mt-1" required readonly id="email" value="{{ Auth::user()->status }}">
            <div class="mt-4"><label class="form-label" for="country"><strong>Prodi *</strong></label>
            <select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="prodi" required>
                <option value="{{ Auth::user()->prodi }}">{{ Auth::user()->prodi }}</option>
              </select></div>
            <div class="py-4">
              <label class="form-label" for="keperluan"><strong>Keperluan *</strong></label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="keperluan" required>
                <option></option>
                <option value="PEMINJAMAN, PENGEMBALIAN, PERPANJANGAN MASA PINJAM BUKU">PEMINJAMAN, PENGEMBALIAN, PERPANJANGAN MASA PINJAM BUKU</option>
                <option value="PERPANJANGAN MASA AKTIF KEANGGOTAAN">PERPANJANGAN MASA AKTIF KEANGGOTAAN</option>
                <option value="PENYERAHAN LAPORAN KERJA PRAKTEK/ PROYEK AKHIR">PENYERAHAN LAPORAN KERJA PRAKTEK/ PROYEK AKHIR</option>
                <option value="PENYERAHAN PROPOSAL KERJA PRAKTEK/ PROYEK AKHIR">PENYERAHAN PROPOSAL KERJA PRAKTEK/ PROYEK AKHIR</option>
                <option value="MEMBACA / MENGERJAKAN TUGAS">MEMBACA / MENGERJAKAN TUGAS</option>
                <option value="ADMINISTRASI LAINNYA">ADMINISTRASI LAINNYA</option>
              </select>
            </div>
            <button class="btn btn-primary mt-4 mb-5 w-100" style="border-radius: 5px;" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
  </script>
  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
        navigator.geolocation.getCurrentPosition(showContainer);
      } else {

        alert('Your device is not support!');
      }
    }

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
        "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 18,
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
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
        "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 18,
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: "mapbox/streets-v11",
          tileSize: 512,
          zoomOffset: -1,
        }
      ).addTo(mymap);
      L.marker([position.coords.latitude, position.coords.longitude])
        .addTo(mymap)
        .bindPopup("Location");
    }
    getLocation()
  </script>
  @endsection