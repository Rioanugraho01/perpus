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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keperluan</th>
                                    <th class="text-center filter-false sorter-false">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($pengunjung as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->prodi }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->keperluan }}</td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;">{{ $user->time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection