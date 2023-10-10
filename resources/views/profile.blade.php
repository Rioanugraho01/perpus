@extends('layouts.app')

@section('content')
</style>
<section class="py-5 mobile">
<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Profile</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('profile') }}">
            @csrf
                <div class="row" style="margin-bottom: 25px;text-align: left;">
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2" style="display: inline;text-align: center;margin-bottom: 25px;"><img class="rounded-circle mb-3 mt-4 img-fluid" src="{{ Auth::user()->image }}" style="display: inline;max-height: 110px;" /><br /><div id="photoBtn" class="btn btn-primary btn-sm" type="button"><label class="form-label text-white m-1" for="customFile1">Ganti</label> 
                    <input name="image" type="file" class="form-control d-none" id="customFile1" />
                    </div> 
                </div>
                    <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                        <div class="row">
                            <div class="col-md-12 text-start">
                                <div class="mb-3"><label class="form-label" for="email"><strong>NIM/NIPPK/E-mail</strong></label><input disabled id="email" class="form-control" type="email" placeholder="{{ Auth::user()->email }}" name="email" required /></div>
                            </div>
                            <div class="col-md-12 text-start">
                                <div class="mb-3"><label class="form-label" for="username"><strong>Nama</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->name }}" name="name" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="no_telp"><strong>No telepon</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->phone }}" name="phone" /></div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3"><label class="form-label" for="country"><strong>status</strong></label><select disabled class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="status" required></select></div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="country"><strong>Prodi</strong></label><select class="form-select countries order-alpha limit-pop-1000000 presel-MX group-continents group-order-na" name="prodi" required>
                            <option value="Agribisnis">Agribisnis</option>
                            <option value="Manajemen Bisnis dan Pariwisata">Manajemen Bisnis dan Pariwisata</option>
                            <option value="Teknik Manufaktur Kapal">Teknik Manufaktur Kapal</option>
                            <option value="Teknologi Pengolahan Hasil Ternak">Teknologi Pengolahan Hasil Ternak</option>
                            <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
                            <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="Bisnis Digital">Bisnis Digital</option>
                            <option value="Teknologi Rekayasa Manufaktur">Teknologi Rekayasa Manufaktur</option>
                            <option value="Teknologi Rekayasa Konstruksi Jalan & Jembatan">Teknologi Rekayasa Konstruksi Jalan & Jembatan</option>
                        </select></div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="address"><strong>Alamat</strong></label><input class="form-control" type="text" placeholder="{{ Auth::user()->alamat }}" name="alamat" /></div>
                    </div>
                    <div class="col">
                        <p id="emailErrorMsg" class="text-danger" style="display: none;"></p>
                        <p id="passwordErrorMsg" class="text-danger" style="display: none;"></p>
                    </div>
                    <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button id="submitBtn" class="btn btn-primary btn-sm" type="submit">Simpan</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>


@endsection