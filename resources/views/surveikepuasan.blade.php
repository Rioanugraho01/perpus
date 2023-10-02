@extends('layouts.app')

@section('content')
<section class="py-4 py-md-5 my-5">
    <div class="container py-4 py-xl-5">
        <div>
            <fieldset>
                <legend>Bagaimana Pendapat Anda tentang kemudahan Prosedur<br />Pelayanan di Perpustakaan ?</legend>
                <div class="custom-control custom-radio"><input id="customRadio1" class="custom-control-input" type="radio" name="customRadio" checked /><label class="form-label custom-control-label" for="customRadio1"> Tidak Mudah</label></div>
                <div class="custom-control custom-radio"><input id="customRadio2" class="custom-control-input" type="radio" name="customRadio" /><label class="form-label custom-control-label" for="customRadio2"> Kurang Mudah</label></div>
                <div class="custom-control custom-radio"><input id="customRadio-2" class="custom-control-input" type="radio" name="customRadio" /><label class="form-label custom-control-label" for="customRadio2"> Mudah </label></div>
                <div class="custom-control custom-radio"><input id="customRadio-1" class="custom-control-input" type="radio" name="customRadio" /><label class="form-label custom-control-label" for="customRadio2"> Sangat Mudah</label></div>
            </fieldset>
            <fieldset>
                <legend>Bagaimana Pendapat Anda tentang kecepatan waktu<br />dalam memberikan pelayanan ?</legend>
                <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline1" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Tidak Mudah</label></div>
                <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline2" class="custom-control-input" type="radio" name="customRadioInline" /><label class="form-label custom-control-label" for="customRadioInline2"> Kurang Mudah</label></div>
                <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-1" class="custom-control-input" type="radio" name="customRadioInline" /><label class="form-label custom-control-label" for="customRadioInline2"> Mudah </label></div>
                <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-2" class="custom-control-input" type="radio" name="customRadioInline" /><label class="form-label custom-control-label" for="customRadioInline2"> Sangat Mudah</label></div>
            </fieldset>
            <fieldset>
                <legend>Bagaimana Pendapat Anda tentang kelengkapan Buku <br />di perpustakaan ?</legend>
                <div class="custom-control custom-checkbox">
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-3" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Tidak Mudah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-4" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Kurang Mudah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-5" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Mudah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-6" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Sangat Mudah</label></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Bagaimana Pendapat Anda terkait perilaku petugas <br />dalam memberikan pelayanan khususnya kesopanan dan <br />keramahan ?</legend>
                <div class="custom-control custom-checkbox custom-control-inline"></div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-7" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Tidak sopan dan ramah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-8" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Kurang sopan dan ramah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-9" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Sopan dan ramah</label></div>
                    <div class="custom-control custom-radio custom-control-inline"><input id="customRadioInline-10" class="custom-control-input" type="radio" name="customRadioInline" checked /><label class="form-label custom-control-label" for="customRadioInline1"> Sangat sopan dan ramah</label></div>
                </div>
            </fieldset>
        </div><a class="btn btn-warning me-2 mt-2" role="button" href="HistoryKunjungan.html" style="background: var(--bs-indigo);color: var(--bs-white);display: inline-block;border-style: none;">Submit</a>
    </div>
</section>
@endsection