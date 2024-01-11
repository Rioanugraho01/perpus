@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('result') }}
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-result" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Points</th>
                                {{-- <th>Questions</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totalPoint as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->total_points }}</td>
                                {{-- <td>{{ $result->user->crated_at }}</td> --}}
                            </tr>

                            @endforeach
                            {{-- @forelse($jawaban as $hasil)
                            <tr data-entry-id="{{ $hasil->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hasil->user_id }}</td>
                                <td>{{ $hasil->total_points }}</td> --}}
                                {{-- <td>
                                    @foreach($hasil->pertanyaan as $key => $pertanyaan)
                                        <span class="badge badge-info">{{ $pertanyaan->pertanyaan }}</span>
                                    @endforeach
                                </td> --}}
                                {{-- <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.results.show', $result->id) }}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.results.edit', $result->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.results.destroy', $result->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td> --}}
                             {{-- </tr>
                                @empty --}}
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            {{-- @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection
