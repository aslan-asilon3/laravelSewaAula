@extends('layouts.app-admin')

@section('title','Data Ruang')

@section('active','active')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Ruang</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('adminruangan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH </a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama ruangan</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($ruangans as $ruangan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/users/').$ruangan->image }}" class="rounded" style="width: 50px">
                                </td>
                                <td>{{ $ruangan->namaruangan }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('adminruangan.destroy', $ruangan->id) }}" method="POST">
                                        <a href="{{ route('adminruangan.edit', $ruangan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        {{-- <a href="adminruangan/edit" class="btn btn-sm btn-primary">EDIT</a> --}}
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data  belum Tersedia.
                              </div>
                          @endforelse
                        </tbody>
                      </table>
                      {{ $ruangans->links() }}
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
