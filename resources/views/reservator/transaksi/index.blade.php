@extends('layouts.app-reservator')

@section('active','active')

@section('title','Transaksi')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reservator / Transaksi</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('reservatortransaksi-create') }}" class="btn btn-md btn-success mb-3">TAMBAH </a>
                    <div style="overflow-x:auto;">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">No KTP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal dari</th>
                            <th scope="col">Tanggal Sampai</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Keterangan</th>
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
                                <td>{{ $transaksi->noktp }}</td>
                                <td>{{ $transaksi->namapenyewa }}</td>
                                <td>{{ $transaksi->nohppenyewa }}</td>
                                <td>{{ $transaksi->emailpenyewa }}</td>
                                <td>{{ $transaksi->alamatpenyewa }}</td>
                                <td>{{ $transaksi->tanggalpemakaiandari }}</td>
                                <td>{{ $transaksi->tanggalpemakaiansampai }}</td>
                                <td>{{ $transaksi->namaruangan }}</td>
                                <td>{{ $transaksi->keperluan }}</td>
                                <td>{{ $transaksi->totalbayar }}</td>
                                <td>{{ $transaksi->keterangan }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admintransaksi-destroy', $transaksi->id) }}" method="POST">
                                        <a href="{{ route('admintransaksi-detail', $transaksi->id) }}" class="btn btn-sm btn-primary">DETAIL</a>
                                        <a href="{{ route('admintransaksi-edit', $transaksi->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                      {{ $transaksis->links() }}
                  </div>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
