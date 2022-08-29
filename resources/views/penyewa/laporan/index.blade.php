@extends('layouts.app-kepalapuskesmas')

@section('active','active')

@section('title','Transaksi')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penyewa / Laporan</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    {{-- <a href="{{ route('admintransaksi-create') }}" class="btn btn-md btn-success mb-3">TAMBAH </a> --}}
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nama</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url('public/users/').$transaksi->image }}" class="rounded" style="width: 50px">
                                </td>
                                <td>{{ $transaksi->namapenyewa }}</td>
                                <td class="text-center">
                                        <a href="{{ route('admintransaksi-detail', $transaksi->id) }}" class="btn btn-sm btn-primary">LAPORAN</a>
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
                      {{-- {{ $transaksis->links() }} --}}
                  </div>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
