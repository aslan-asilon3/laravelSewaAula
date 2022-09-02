
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>Sistem Informasi Sewa Aula</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->


<div class="container-fluid">


    <!-- Content Row -->
    <div class="row">
        {{-- {{
            // $date = Carbon::parse('2021-03-16 08:27:00')->locale('id');

            // $date->settings(['formatFunction' => 'translatedFormat']);

            // echo $date->format('l, j F Y ; h:i a');
        }} --}}

        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><strong><i class="icon-tasks"></i> Rincian Reservasi</strong></div>
                <div class="card-body">
                    <form id="form" method="POST" action="">
                        @method('POST')
                        @csrf
                        <a href="" hidden>
                            {{
                                // $transaksi =
                                $total =  old('pemakaiansampai', $transaksi->pemakaiansampai) -  old('pemakaiandari', $transaksi->pemakaiandari)
                            }}
                        </a>
                        <h4 class="mb-1">Detail Transaksi</h4>
                        <hr />
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th width="50%">Dari:</th>
                                <th width="50%">Sampai:</th>
                                <th width="50%">Jumlah Hari:</th>
                            </tr>
                            <tr>
                                <td>{{ $transaksi->pemakaiandari }}</td>
                                <td>{{ old('tanggalpemakaiandari', $transaksi->tanggalpemakaiandari) }}</td>
                                <td>{{ old('tanggalpemakaiansampai', $transaksi->tanggalpemakaiansampai) }}</td>
                                <td><input type="hidden" value="{{ $selisihhari = strtotime(old('tanggalpemakaiandari', $transaksi->tanggalpemakaiansampai))- strtotime(old('tanggalpemakaiandari', $transaksi->tanggalpemakaiandari))}}"></td>
                                <td>{{ $hari = $selisihhari/60/60/24;}}</td>
                            </tr>
                        </table>
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th width="50%">Nama Pemesan:</th>
                            </tr>
                            <tr>
                                <td>{{ old('namapenyewa', $transaksi->namapenyewa) }}</td>
                            </tr>
                        </table>
                        <table width="70%" style="margin-bottom:20px">
                            <tr>
                                <th>Keperluan:</th>
                            </tr>
                            <tr>
                                <td>{{ old('keperluan', $transaksi->keperluan) }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered" width="100">
                            <tr>
                                <th width="65%">Harga</th>
                                <th width="10%">Durasi</th>
                                <th width="25%">Total</th>
                            </tr>
                            <tr>
                                <td>{{ old('harga', $transaksi->harga) }}</td>
                                <td>{{ old('harga', $transaksi->harga) }}</td>
                                <td>1 hari</td>
                                <td>{{ $total }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Total<strong></td>
                                <td><strong>Rp. {{ $hasil = old('totalbayar', $transaksi->totalbayar)* $hari }},-</strong></td>
                            </tr>
                        </table>
                        <button type="submit" onclick="window.print()" class="btn btn-success">Print PDF</button>
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
							<li>Isi formulir dilakukan oleh bagian reservasi termasuk KTP (Kartu Tanda Penduduk), karena akan digunakan pada saat verifikasi.</li>
							<li>Setelah berhasil melakukan pemesanan, lakukan <strong>verifikasi paling lambat 3 hari setelah pemesanan</strong>, dengan cara datang langsung pada jam kerja ke <strong>Ruang Layanan Informasi</strong> Puskesmas Kecamatan Kemayoran dan menunjukkan <strong>KTP beserta bukti cetak reservasi online</strong>.</li>
							<li>Jika dalam waktu 3 hari Anda belum melakukan verifikasi, data pemesanan Anda akan dihapus.</li>
							<li>Perubahan tanggal hanya bisa dilakukan 1 kali, paling lambat 3 hari sebelum tanggal acara, dan hanya jika jadwal yang diingkan masih kosong.</li>
							<li>Apabila terjadi pembatalan segera hubungi petugas .</li>
							<li>Dapat melalui transfer bank mandiri 1270011300694 atas nama sulaslan setiawan.</li>
						</ol>
				</div>
			</div>
        </div>
    </div>



        </div>

    </div>


</div>

<script>
    //  $("#form").click(function(){
    //     form.hide()
    //     // window.print()
    //     // onclick="window.print()"
    //     });
</script>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

    {{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'keterangan' );
    </script> --}}
</body>

</html>




