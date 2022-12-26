<?php $ceks = $this->session->userdata('no_pendaftaran'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB Online | SDIT AL-QUDWAH</title>
		<base href="<?php echo base_url();?>"/>

		<link rel="icon" href="assets/images/logo.png" type="image/png" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <linkh ref="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }

    table th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }

    table th:first-child {
        border-left: none;
    }

    table tr {
        text-align: center;
        padding-left: 20px;
    }

    table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }

    table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }

    table tr:last-child td {
        border-bottom: 0;
    }

    table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/logo.png" alt="Logo" width="35" style="position:absolute;margin-top:-10px;"> <span style="margin-left:35px;">PPDB Online</span> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#prosedur"><i class="fa fa-random"></i> Alur</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-bookmark"></i> Info</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#syarat"><i class="fa fa-briefcase"></i> Syarat</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak</a>
                    </li>
                    <li class="page-scroll">
                        <a href="panel_admin/log_in"><i class="fa fa-user"></i> Login</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
      <?php
      if (strtolower($this->uri->segment(1)) == 'logcs') {
        $this->load->view('web/login');
      } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <img class="img-responsive" src="img/logo.png" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <div class="intro-text"><br>
                        <span class="name shad" style="font-size:35px">PPDB ONLINE <br> SDIT AL-QUDWAH</span>

                        <br>
                      <?php if ($web_ppdb->status_ppdb == 'buka') {?>
                      
                        <span>
                         <a href="pendaftaran" class="btn btn-warning" style="margin: 5px; border-radius: 6px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PPDB Online</a>
						
                        <a href="logcs" class="btn btn-danger" style="margin: 5px; border-radius: 6px;"><i class="fa fa-users faa-pulse animated"></i> &nbsp;<?php if($ceks==''){echo "Login";}else{echo "Panel";} ?> Calon Siswa</a>
												 <br>
											  </span>
                      <?php }else{ ?>
                        <span class="skills">
                        </span>
                        <br> <br>
                        <hr class="star-light">
												<br>
                        <!-- <h3>Login Calon Siswa Terdaftar di PPDB Online SMK Plus Al-Maftuh</h3> -->
                        <span>
                         <a href="javascript:void(0);" class="btn btn-success btn-lg" style="margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PPDB Online ditutup</a>
												 <br>
											  </span>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section id="prosedur">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Prosedur PPDB Online</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">

                    <div class="col-md-2"></div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="col-lg-12 text-center">
                            
                                <ol style="font-size:14px;text-align:justify">
                                <li>Calon Siswa mendaftarkan diri atau melakukan <b><a href="pendaftaran">Pendaftaran PPDB <i>online</i></a></b> melalui website <b><a href="">PPDB SDIT AL-QUDWAH</a></b>.</li>
                                <li>Setelah Calon Siswa berhasil melakukan pendaftaran, Calon siswa wajib melakukan <b>Print Out Pendaftaran & Mempersiapkan Kelengkapan Berkas PPDB SDIT AL-QUDWAH</b>.</li>
                                <li>Calon siswa datang ke SDIT AL-QUDWAH untuk <b>VERIFIKASI</b>, membawa <b>Bukti pendaftaran & Kelengkapan Berkas PPDB SDIT AL-QUDWAH</b>. </li>
                                <li>Panitia PPDB melakukan <b>Verifikasi dan Validasi Berkas Pendaftaran</b>.</li>
                                <li>Setelah selesai Calon Siswa Menerima <b>TANDA BUKTI VERIFIKASI</b>.</li>
                                <li>PENGUMUMAN HASIL PPDB Online bisa dilihat di Web PPDB SDIT AL-QUDWAH. Untuk <b>No. Pendaftaran</b> sesuaikan dengan <b>Formulir No. Pendaftaran</b> & <b>Passwordnya</b> yaitu <b>NISN</b> Calon Siswa tersebut.</li>
                                <li>Jika Calon Siswa dinyatakan <b>LULUS</b> maka Calon Siswa Wajib <b>Registrasi/Daftar Ulang</b> di <b>SDIT AL-QUDWAH</b>.</li>
                                                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about" style="padding: 30px; border-top: 2px solid #fff;">
        <div class="container">
            <div class=" row">
                <div class="col-lg-12 text-center">
                    <h2>Informasi PPDB Online</h2>
                    <hr style="width: 150px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify; line-height: 22px;">
                    <p>SDIT AL-QUDWAH menyediakan PPDB secara <i>online</i> agar diharapkan proses PPDB dapat berjalan cepat dan bisa dilakukan dimanapun dan kapanpun selama sesi PPDB Online dibuka. Proses pendaftaran calon siswa baru di masa pandemi Covid-19 ini dan terhambat oleh jarak jika datang ke sekolah langsung, bisa mengakses website PPDB Online SDIT AL-QUDWAH. </p>
                </div>
                <div class="col-lg-4" style="text-align:justify; line-height: 22px;">
                    <p>Dalam pengisian form PPDB Online mohon untuk diperhatikan data yang dibutuhkan yang nantinya akan dipakai dalam proses PPDB. Setelah proses pengisian form PPDB secara online berhasil dilakukan, calon siswa akan mendapat bukti daftar dengan nomor pendaftaran dan harus disimpan yang akan digunakan untuk proses selanjutnya.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#page-top" class="btn btn-warning" style="border-radius: 5px;">
                        <i class="fa fa-home "></i> PPDB ONLINE
                    </a> &nbsp;&nbsp;
                    <a href="logcs" class="btn btn-danger" style="border-radius: 5px;">
                        <i class="fa fa-sign-in"></i>
                        <?php if ($ceks == '') {
                            echo "LOGIN";
                        } else {
                            echo "Panel";
                        } ?> SISWA
                    </a>&nbsp;&nbsp;

                </div>
            </div>
        </div>
    </section>

     <section id="syarat" style="background: url(img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Syarat Pendaftaran</h2>
                    <hr style="width: 150px;">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">

                    <div class="col-md-2"></div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="col-lg-12 text-center">
                            
                                <ol style="font-size:14px;text-align:justify">
                                <li>Pas Foto berwarna ukuran 3x4 dalam format PNG. Ukuran file maksimal 2MB</li>
                                <li>Scan Kartu Keluarga (KK) dalam format PDF. Ukuran file maksimal 2MB</li>
                                <li>Scan Ijazah TK / PAUD (Jika ada) dalam format PDF. Ukuran file maksimal 2MB </li>
                                <li>Scan KTP Orang tua / Wali dalam format PDF. Ukuran file maksimal 2MB</li>
                                <li>Scan Akte Kelahiran dalam format PDF. Ukuran file maksimal 2MB</li>
                                
                                                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     

    <section class="success" id="contact">
        <!-- <div class="container"> -->
            <div class="row" style="margin-top:-100px;margin-bottom:-105px;">
                <div class="col-lg-12 text-center">
                  <br><br>
                    <h3>Kontak Kami</h3>
                    <hr style="width: 150px;">
                </div>
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h4 align="center">PPDB Online SDIT AL-QUDWAH<br>Jl. Perjuangan No. 191, RT 01/RW 017, Kelurahan Sri Meranti, Kecamatan Rumbai, Pekanbaru</h4>

                        <p align="center" style="font-size: 14px;">
                            <span><b><i class="fa fa-phone-square">&nbsp;</i>
                            081372665064 (Ust. Zafrullah A. Rahman)<br>
                            082312560206 (Ust. Rifqy Azka Z.)<br>
                            0811760276 (Ust. Syaiful)
                            </b></span><br>
                            <span><b><i class="fa fa-envelope">&nbsp;</i>syaifulabdrumbai@gmail</b></span><br>
                            <span><b><i class="fa fa-globe">&nbsp;</i>http://sditalqudwah.mysch.id/</b></span>
                        </p>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
   <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        PPDB Online &copy; SDIT AL-QUDWAH - <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>

</body>
</html>
