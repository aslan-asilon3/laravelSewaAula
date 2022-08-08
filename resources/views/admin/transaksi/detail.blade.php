@extends('layouts.app-admin')

@section('active','active')

@section('title','Transaksi Detail')

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

            <div class="card">
                <div class="card-header"><strong><i class="icon-tasks"></i> Rincian Reservasi</strong></div>
                <div class="card-body">
                    <form id="form" method="POST" action="/admintransaksipdf">
                        @method('POST')
                        @csrf
                        {{-- <input type="hidden" name="_token" value="CuodKwgBUcMAouMtXpI0ywZNv91QiZBFtrsiadH3">
                        <input type="hidden" id="pemesan_ktp" name="namapenyewa" value="{{ old('namapenyewa', $transaksi->first()->namapenyewa) }}">
                        <input type="text" id="pemesanpenyewa" name="namapenyewa" value="{{ old('namapenyewa', $transaksi->first()->namapenyewa) }}">
                        <input type="hidden" id="pemesan_telp" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="pemesan_email" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="pemesan_alamat" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="pemakai_nama" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="pemakai_telp" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="dari" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="sampai" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="gedung" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="jumlah" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}">
                        <input type="hidden" id="keperluan" name="nohppenyewa" value="{{ old('nohppenyewa', $transaksi->first()->nohppenyewa) }}"> --}}
                        <h4 class="mb-1">Ruang Aula Kelas</h4>
                        <hr />
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th width="50%">Dari:</th>
                                <th width="50%">Sampai:</th>
                                <th width="50%">Jumlah Hari:</th>
                            </tr>
                            <tr>
                                {{-- <td>{{ $transaksi->namapenyewa }}</td> --}}
                                {{-- <td>{{ old('tanggalpemakaiandari', $transaksi->first()->tanggalpemakaiansampai) }}</td> --}}
                                {{-- <td><input type="hidden" value="{{ $selisihhari = strtotime(old('tanggalpemakaiandari', $transaksi->first()->tanggalpemakaiansampai))- strtotime(old('tanggalpemakaiandari', $transaksi->first()->tanggalpemakaiandari))}}"></td> --}}
                                {{-- <td>{{ $hari = $selisihhari/60/60/24;}}</td> --}}
                            </tr>
                        </table>
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th width="50%">Nama Pemesan:</th>
                            </tr>
                            <tr>
                                <td>{{ $transaksi}}</td>
                                {{-- <td><input type="text" class="form-control @error('namapenyewa') is-invalid @enderror" name="namapenyewa" value="{{ $transaksi->namapenyewa }}" placeholder=""></td> --}}
                            </tr>
                        </table>
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th>Keperluan:</th>
                            </tr>
                            <tr>
                                {{-- <td>{{ $transaksi->keperluan }}</td> --}}
                            </tr>
                        </table>
                        <table class="table table-bordered" width="100">
                            <tr>
                                <th width="65%">Harga</th>
                                <th width="10%">Durasi</th>
                                <th width="25%">Total</th>
                            </tr>
                            <tr>
                                {{-- <td>{{ old('harga', $transaksi->first()->harga) }}</td> --}}
                                {{-- <td>1 hari</td> --}}
                                {{-- <td>Rp. {{ old('totalbayar', $transaksi->first()->totalbayar) }},-</td> --}}
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Total<strong></td>
                                {{-- <td><strong>Rp. {{ $hasil = old('totalbayar', $transaksi->first()->totalbayar)* $hari }},-</strong></td> --}}
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Reservasi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col_two_fifth col_last">
            <div class="card">
				<div class="card-header"><strong><i class="icon-line2-info"></i> Petunjuk Reservasi</strong></div>
				<div class="card-body">
						<ol align="justify" style="padding-left: 10px; margin-bottom: 0px">
							<li>Penyewaan fasilitas diajukan paling lambat 7 hari kerja sebelum tanggal acara.</li>
							<li>Isi formulir disebelah dengan benar termasuk KTP (Kartu Tanda Penduduk), karena akan digunakan pada saat verifikasi.</li>
							<li>Setelah berhasil melakukan pemesanan, lakukan <strong>verifikasi paling lambat 3 hari setelah pemesanan</strong>, dengan cara datang langsung pada jam kerja ke <strong>Ruang Layanan Informasi</strong> BPSDM Provinsi Kalimantan Timur dan menunjukkan <strong>KTP beserta bukti cetak reservasi online</strong>.</li>
							<li>Jika dalam waktu 3 hari Anda belum melakukan verifikasi, data pemesanan Anda akan dihapus.</li>
							<li>Perubahan tanggal hanya bisa dilakukan 1 kali, paling lambat 3 hari sebelum tanggal acara, dan hanya jika jadwal yang diingkan masih kosong.</li>
							<li>Apabila terjadi pembatalan segera hubungi petugas.</li>
						</ol>
				</div>
			</div>
        </div>
    </div>



        </div>

    </div>


</div>

@endsection
