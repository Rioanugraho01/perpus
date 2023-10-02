@extends('layouts.app')

@section('content')
<section class="py-4 py-md-5 my-5">
    <div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
            </div>
        </div>
        <div id="TableSorterCard" class="card">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="ipi-table" class="table table-striped table tablesorter">
                            <thead class="thead-dark">
                                <tr style="background: var(--bs-indigo);">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center filter-false sorter-false">Keperluan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1.</td>
                                    <td>09.00</td>
                                    <td>02/01/2023</td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;">Mengerjakan Tugas</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>08.00</td>
                                    <td>12/01/2023</td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;">Membaca Buku</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection