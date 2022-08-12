<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Level HTML Template</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('assets-landing/font-awesome-4.7.0/css/font-awesome.min.css')}}">                <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap.min.css')}}">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('text/css" href="assets-landing/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('text/css" href="assets-landing/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-landing/css/datepicker.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets-landing/css/tooplate-style.css')}}">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <!-- Top Navbar -->
            <div class="container">
                <div class="row">
                    
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="img/logo.png" alt="Site logo">
                            Level
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item">
                                <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tm-section-3">Cek Jadwal</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tm-section-4">Informasi</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#tm-section-6">Reservasi</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                              </li>
                            </ul>
                        </div>                            
                    </nav>            
                </div>
            </div>
        </div>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            <div class="container" style="text-align: center;">

                                <h2>Selamat Datang di <br>
                                    Sistem Informasi Penyewaan Ruang Aula <br>
                                    Puskesmas Kecamatan Kemayoran
                                </h2>

                            </div>
                        </div>                        
                    </div>      
                </div>
            </div>                  
        </div>
        
        <div class="tm-section-2">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="tm-section-title">Reservasi Sekarang !</h2>
                        <p class="tm-color-white tm-section-subtitle">.</p>
                        <a href="#tm-section-6"class="tm-color-white tm-btn-white-bordered">Reservasi</a>
                    </div>                
                </div>
            </div>        
        </div>
        
        <div class="tm-section tm-position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>                   
            </svg> 
            <div class="container tm-pt-5 tm-pb-4" id="tm-section-3">
                <div class="card">
                    <div class="card-header"><strong><i class="icon-bars"></i> Cek Jadwal</strong></div>
                    <div class="card-body">
                        <p>Daftar Nama Yang Akan Sewa Di Hari Selanjutnya</p>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Ruangan</th>
                                    <th>Keperluan</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Akhir</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->namapenyewa }}</td>
                                    <td>{{ $transaksi->namaruangan }}</td>
                                    <td>{{ $transaksi->keperluan }}</td>
                                    <td>{{ $transaksi->tanggalpemakaiandari }}</td>
                                    <td>{{ $transaksi->tanggalpemakaiansampai }}</td>

                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data  belum Tersedia.
                                  </div>
                              @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
        
        <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-header"><strong><i class="icon-bars"></i> Dasar & Tarif Fasilitas</strong></div>
                        <div class="card-body">
                            <p>Peraturan Daerah Provinsi DKI Jakarta Nomor 4 Tahun 2018 tentang Perubahan Atas Peraturan
                                Daerah Provinsi DKI Jakarta Nomor 2 Tahun 2012 Tentang Retribursi Jasa Usaha.</p>
        
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fasilitas</th>
                                        <th>Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                <tr>
                                        <td>1</td>
                                        <td>Aula Utama I</td>
                                        <td>Rp. 2.500.000 / hari</td>
                                    </tr>
                                                                <tr>
                                        <td>2</td>
                                        <td>Aula Utama II</td>
                                        <td>Rp. 2.000.000 / hari</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
            <div class="tm-section tm-section-pad tm-bg-img" id="tm-section-5">                                                        
                <div class="container ie-h-align-center-fix">
                    <div class="row tm-flex-align-center">

                    </div>
                </div>
            </div>
        </div>           
        
        <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
            <div class="container ie-h-align-center-fix">
                <div class="row" style="width: 200%">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                        <div class="tm-bg-white tm-p-4">
                            <div class="card-header"><strong><i class="icon-tasks"></i> Formulir Reservasi</strong></div>
                            <div class="card-body">
                            <form action="/" method="post" class="contact-form" style="width:100%;">
                                <input type="hidden" name="_token" value="ysAJoAimyGYBp5B6vwhAfClEdu0EQwi1ZXIR1rSq">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="pemesan_ktp">No. KTP <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pemesan_ktp" id="pemesan_ktp" placeholder="Nomor Identitas KTP"
                                            minlength="16" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="pemesan_nama">Nama Pemesan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pemesan_nama" id="pemesan_nama"
                                            placeholder="Nama Lengkap Pemesan" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pemesan_telp">No. Telepon Pemesan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pemesan_telp" id="pemesan_telp"
                                            placeholder="No. Telepon Pemesan" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pemesan_email">Email Pemesan <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="pemesan_email" id="pemesan_email"
                                            placeholder="Email Pemesan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pemesan_alamat">Alamat Pemesan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pemesan_alamat" id="pemesan_alamat"
                                        placeholder="Alamat Lengkap Pemesan" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pemakai_nama">Nama Pemakai</label>
                                        <input type="text" class="form-control" name="pemakai_nama" id="pemakai_nama"
                                            placeholder="Nama Lengkap Pemakai">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pemakai_telp">No. Telepon Pemakai</label>
                                        <input type="text" class="form-control" name="pemakai_telp" id="pemakai_telp"
                                            placeholder="No. Telepon Pemakai">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Pemakaian <span class="text-danger">*</span></label>
                                    <div class="input-daterange input-group">
                                        <input type="date" id="dari" name="dari" value="" class="form-control tleft"
                                            placeholder="YYYY-MM-DD" autocomplete="off" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">sampai</div>
                                        </div>
                                        <input type="date" id="sampai" name="sampai" value="" class="form-control tleft"
                                            placeholder="YYYY-MM-DD" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="gedung">Fasilitas <span class="text-danger">*</span></label>
                                        <select id="gedung" name="gedung" class="form-control" required>
                                            <option value="" selected>-- Pilih Gedung --</option>
                                                                                <option value="1">Aula Utama I</option>
                                                                                <option value="2">Aula Utama II</option>
                                                                                <option value="3">Ruang Kelas / Ruang Belajar</option>
                                                                                <option value="4">Ruang Aula Kelas</option>
                                                                                <option value="6">Asrama</option>
                                                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jumlah">Jumlah Sewa <span class="text-danger">*</span></label>
                                        <select id="jumlah" name="jumlah" class="form-control" required>
                                            <option value="" selected>-- Pilih Jumlah --</option>
                                            <option value="1" selected>1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan <span class="text-danger">*</span></label>
                                    <select id="keperluan" name="keperluan" class="form-control" required>
                                        <option value="" selected>-- Pilih Keperluan --</option>
                                                                        <option value="6">Bimtek / Diklat</option>
                                                                        <option value="8">Kunjungan/Visitasi</option>
                                                                        <option value="9">Liburan</option>
                                                                        <option value="3">Pentas Seni</option>
                                                                        <option value="5">Perpisahan</option>
                                                                        <option value="2">Rapat / Pertemuan</option>
                                                                        <option value="1">Seminar</option>
                                                                        <option value="7">Test / Ujian</option>
                                                                        <option value="4">Wisuda / Yudisium</option>
                                                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label" for="setuju" style="text-transform: none; font-weight: 400">
                                            <input class="form-check-input" type="checkbox" name="setuju" id="setuju" required>
                                            Saya menyetujui segala ketentuan dan aturan yang berlaku tentang penyewaan
                                            fasilitas pada Puskesmas kecamatan kemayoran.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div data-sitekey="6LcFYZIUAAAAAIdbjcpu-vHnlpYIsiGLiBL6GTY4" class="g-recaptcha"></div>
                                </div>                        
                                <button type="submit" class="button button-3d">Lanjut</button>
                            </form>

                        </div>
                        </div>
                            <div class="card">
                                <div class="card-header"><strong><i class="icon-line2-info"></i> Petunjuk Reservasi</strong></div>
                                <div class="card-body">
                                        <ol align="justify" style="padding-left: 10px; margin-bottom: 0px">
                                            <li>Penyewaan fasilitas diajukan paling lambat 7 hari kerja sebelum tanggal acara.</li>
                                            <li>Isi formulir disebelah dengan benar termasuk KTP (Kartu Tanda Penduduk), karena akan digunakan pada saat verifikasi.</li>
                                            <li>Setelah berhasil melakukan pemesanan, lakukan <strong>verifikasi paling lambat 3 hari setelah pemesanan</strong>, dengan cara datang langsung pada jam kerja ke <strong>Ruang Layanan Informasi</strong> Puskesmas Kecamatan Kemayoran dan menunjukkan <strong>KTP beserta bukti cetak reservasi online</strong>.</li>
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
        
        <footer class="tm-bg-dark-blue">
            <div class="container">
                <div class="row">
                    <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                    Copyright &copy; <span class="tm-current-year">2018</span> Your Company
                    
                    - Design: Tooplate</p>        
                </div>
            </div>                
        </footer>
    </div>
        </div>

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        
        <!-- load JS files -->
        <script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="{{ asset('js/popper.min.js')}}"></script>                    <!-- https://popper.js.org/ -->       
        <script src="{{ asset("js/bootstrap.min.js")}}"></script>                 <!-- https://getbootstrap.com/ -->
        <script src="{{ asset('js/datepicker.min.js')}}"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="{{ asset('js/jquery.singlePageNav.min.js')}}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="{{ asset('assets-landing/slick/slick.min.js')}}"></script>                  <!-- http://kenwheeler.github.io/assets-landing/slick/ -->
        <script>

            /* Google map
            ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(13.7567928,100.5653741),
                    scrollwheel: false
                };

                map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                google.maps.event.addDomListener(map, 'idle', function() {
                  calculateCenter();
              });

                google.maps.event.addDomListener(window, 'resize', function() {
                  map.setCenter(center);
              });
            }

            function calculateCenter() {
                center = map.getCenter();
            }

            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            } 

            function setCarousel() {
                
                if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                    $('.tm-article-carousel').slick('destroy');
                } 

                if($(window).width() < 438){
                    // Slick carousel
                    $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                }
                else {
                 $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    });   
                }
            }

            function setPageNav(){
                if($(window).width() > 991) {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 79
                    });   
                }
                else {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 65
                    });   
                }
            }

            function togglePlayPause() {
                vid = $('.tmVideo').get(0);

                if(vid.paused) {
                    vid.play();
                    $('.tm-btn-play').hide();
                    $('.tm-btn-pause').show();
                }
                else {
                    vid.pause();
                    $('.tm-btn-play').show();
                    $('.tm-btn-pause').hide();   
                }  
            }
       
            $(document).ready(function(){

                $(window).on("scroll", function() {
                    if($(window).scrollTop() > 100) {
                        $(".tm-top-bar").addClass("active");
                    } else {
                        //remove the background property so it comes transparent again (defined in your css)
                       $(".tm-top-bar").removeClass("active");
                    }
                });      

                // Google Map
                loadGoogleMap();  

                // Date Picker
                const pickerCheckIn = datepicker('#inputCheckIn');
                const pickerCheckOut = datepicker('#inputCheckOut');
                
                // Slick carousel
                setCarousel();
                setPageNav();

                $(window).resize(function() {
                  setCarousel();
                  setPageNav();
                });

                // Close navbar after clicked
                $('.nav-link').click(function(){
                    $('#mainNav').removeClass('show');
                });

                // Control video
                $('.tm-btn-play').click(function() {
                    togglePlayPause();                                      
                });

                $('.tm-btn-pause').click(function() {
                    togglePlayPause();                                      
                });

                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());                           
            });

        </script>             

</body>
</html>

