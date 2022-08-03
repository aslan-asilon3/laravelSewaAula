@extends('layouts.app-admin')

@section('active','active')

@section('title','Transaksi Edit')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Edit</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('admintransaksiupdate', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">No KTP</label>
                            <input type="text" class="form-control @error('noktp') is-invalid @enderror" name="noktp" value="{{ old('noktp', $transaksi->first()->noktp) }}" placeholder="Masukkan No KTP">

                            <!-- error message untuk title -->
                            @error('noktp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('namapenyewa') is-invalid @enderror" name="namapenyewa" value="{{ old('namapenyewa', $transaksi->first()->namapenyewa) }}" placeholder="Masukkan Nama">

                            <!-- error message untuk title -->
                            @error('namapenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">No HP</label>
                            <input type="text" class="form-control @error('nohppenyewa') is-invalid @enderror" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa ) }}" placeholder="Masukkan No HP">

                            <!-- error message untuk title -->
                            @error('nohppenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="text" class="form-control @error('emailpenyewa') is-invalid @enderror" name="emailpenyewa" value="{{ old('emailpenyewa', $transaksi->first()->emailpenyewa) }}" placeholder="Masukkan email  ">

                            <!-- error message untuk title -->
                            @error('emailpenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control @error('alamatpenyewa') is-invalid @enderror" name="alamatpenyewa" value="{{ old('alamatpenyewa', $transaksi->first()->alamatpenyewa) }}" placeholder="Masukkan Alamat  ">

                            <!-- error message untuk title -->
                            @error('emailpenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Dari</label>
                            <input type="date" class="form-control @error('tanggalpemakaiandari') is-invalid @enderror" name="tanggalpemakaiandari" value="{{ old('tanggalpemakaiandari', $transaksi->first()->tanggalpemakaiandari) }}" placeholder="Masukkan Tanggal Dari  ">

                            <!-- error message untuk title -->
                            @error('tanggalpemakaiandari')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Sampai</label>
                            <input type="date" class="form-control @error('tanggalpemakaiansampai') is-invalid @enderror" name="tanggalpemakaiansampai" value="{{ old('tanggalpemakaiansampai', $transaksi->first()->tanggalpemakaiansampai) }}" placeholder="Masukkan Tanggal Sampai  ">

                            <!-- error message untuk title -->
                            @error('tanggalpemakaiansampai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Ruangan</label>
                            <input type="text" class="form-control @error('namaruangan') is-invalid @enderror" name="namaruangan" value="{{ old('namaruangan', $transaksi->first()->namaruangan) }}" placeholder="Masukkan Ruangan ">

                            <!-- error message untuk title -->
                            @error('namaruangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keperluan</label>
                            <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" value="{{ old('keperluan', $transaksi->first()->keperluan) }}" placeholder="Masukkan Keperluan ">

                            <!-- error message untuk title -->
                            @error('keperluan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Diskon</label>
                            <input type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon', $transaksi->first()->diskon) }}" placeholder="Masukkan Diskon ">

                            <!-- error message untuk title -->
                            @error('diskon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Total Bayar</label>
                            <input type="text" class="form-control @error('totalbayar') is-invalid @enderror" name="totalbayar" value="{{ old('totalbayar', $transaksi->first()->totalbayar) }}" placeholder="Masukkan Total Bayar  ">

                            <!-- error message untuk title -->
                            @error('totalbayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $transaksi->first()->keterangan) }}" placeholder="Masukkan Keterangan ">

                            <!-- error message untuk title -->
                            @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
