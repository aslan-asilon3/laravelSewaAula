@extends('layouts.app-admin')

@section('active','active')

@section('title','Transaksi Create')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('admintransaksi.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

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
                            <input type="number" class="form-control @error('noktp') is-invalid @enderror" name="noktp" value="{{ old('noktp') }}" placeholder="Masukkan Nomor KTP">

                            <!-- error message untuk title -->
                            @error('noktp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('namapenyewa') is-invalid @enderror" name="namapenyewa" value="{{ old('namapenyewa') }}" placeholder="Masukkan Nama User">

                            <!-- error message untuk title -->
                            @error('namapenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">No HP</label>
                            <input type="text" class="form-control @error('nohppenyewa') is-invalid @enderror" name="nohppenyewa" value="{{ old('nohppenyewa') }}" placeholder="Masukkan No HP">

                            <!-- error message untuk title -->
                            @error('nohppenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="text" class="form-control @error('emailpenyewa') is-invalid @enderror" name="emailpenyewa" value="{{ old('emailpenyewa') }}" placeholder="Masukkan Email">

                            <!-- error message untuk title -->
                            @error('emailpenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control @error('alamatpenyewa') is-invalid @enderror" name="alamatpenyewa" value="{{ old('alamatpenyewa') }}" placeholder="Masukkan Alamat">

                            <!-- error message untuk title -->
                            @error('alamatpenyewa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Dari</label>
                            <input type="date" class="form-control @error('tanggalpemakaiandari') is-invalid @enderror" name="tanggalpemakaiandari" value="{{ old('tanggalpemakaiandari') }}" placeholder="Masukkan Tanggal mulai">

                            <!-- error message untuk title -->
                            @error('tanggalpemakaiandari')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Sampai</label>
                            <input type="date" class="form-control @error('tanggalpemakaiansampai') is-invalid @enderror" name="tanggalpemakaiansampai" value="{{ old('tanggalpemakaiansampai') }}" placeholder="Masukkan Tangal Sampai">

                            <!-- error message untuk title -->
                            @error('tanggalpemakaiansampai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{ $selisihhari = strtotime(old('tanggalpemakaiandari'))- strtotime(old('tanggalpemakaiandari'))}}

                        <div class="form-group">
                            <label class="font-weight-bold">jumlah hari</label>
                            <input type="integer" class="form-control @error('tanggalpemakaiansampai') is-invalid @enderror" name="" value="{{$selisihhari}}" placeholder="{{ $selisihhari}}">

                            <!-- error message untuk title -->
                            @error('tanggalpemakaiansampai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Ruangan</label>
                            {{-- <input type="text" class="form-control @error('namaruangan') is-invalid @enderror" name="namaruangan" value="{{ old('namaruangan') }}" placeholder="Masukkan Ruangan"> --}}
                            <select class="form-control" name="namaruangan">
                                <option>-- Select Ruangan --</option>
                                @foreach ($keperluans as $keperluan)
                                <option value="{{ $keperluan->id }}">{{ $keperluan->namaruangan }}</option>
                             @endforeach
                            </select>

                            <!-- error message untuk title -->
                            @error('namaruangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keperluan</label>
                            {{-- <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" value="{{ old('keperluan') }}" placeholder="Masukkan keperluan"> --}}

                            <select class="form-control" name="keperluan">
                                <option>-- Select Keperluan --</option>
                                @foreach ($keperluans as $keperluan)
                                <option value="{{ $keperluan->id }}">{{ $keperluan->keperluan }}</option>
                             @endforeach
                            </select>

                            <!-- error message untuk title -->
                            @error('keperluan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">diskon</label>
                            <input type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon') }}" placeholder="Masukkan Diskon">

                            <!-- error message untuk title -->
                            @error('diskon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Total Bayar</label>
                            <input type="text" class="form-control @error('totalbayar') is-invalid @enderror" name="totalbayar" value="{{ old('totalbayar') }}" placeholder="Masukkan Total Bayar">

                            <!-- error message untuk title -->
                            @error('totalbayar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan">

                            <!-- error message untuk title -->
                            @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
