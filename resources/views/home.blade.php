<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medhitama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/home-assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/home-assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/home-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/home-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/home-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/home-assets/vendor/glightbox/css/glightbox.min.cs') }}s" rel="stylesheet">
  <link href="{{ asset('/home-assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/home-assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lumia
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="{{ route('index') }}"><strong>MEDHITAMA</strong></a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link" href="{{ route('index') }}">Home</a></li>
          <li><a class="nav-link" href="#bidang">Bidang Kami</a></li>
          <li><a class="nav-link" href="#tentang">Tentang Kami</a></li>
          <li><a class="nav-link" href="#kontak">Kontak</a></li>
          <li><a class="nav-link" href="#resi">Periksa Resi</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1 class="my-5">Selamat Datang di <br> <span>PT. MULTISARANA MEDHITAMA</span></h1>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= What We Do Section ======= -->
    <section id="bidang" class="what-we-do">
      <div class="container">

        <div class="section-title">
          <h2>Bidang Kami</h2>
          <p>Kami bergerak di bidang jasa transportasi darat dan laut</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Ekspedisi Darat</a></h4>
              <p>Mengerjakan untuk trucking ke wilayah Jawa, NTB dan NTT</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Ekspedisi Laut</a></h4>
              <p>Mengerjakan job di Kalimantan, Sulawesi dan Papua</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="tentang" class="about section-bg">
      <div class="container mt-5">

        <div class="section-title">
            <h2>Tentang Kami</h2>
            <p>PT. MULTISARANA MEDHITAMA</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="{{ asset('/home-assets/img/about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="text-align: justify">
                PT. Multisarana Mednitama lahir dan awali dengan nama CV. Multi Sarana Mediatama pada tahun
                2005 yang bergerak di bidang jasa transportasi yang memfokuskan di bidang jasa ekspedisi darat dan
                laut, banyak mengerjakan Job di Kalimantan, Sulawesi dan Papua, sedangkan untuk ekspedisi darat
                mengerjakan untuk trucking ke wilayah jawa, NTB dan NTT.
                <br><br>
                Sesuai dengan perkembangan usaha dan tuntutan rekanan kami, kami memperluas usaha dan
                merubah nama menjadi PT. Multisarana Medhitama sejak 11 Mei 2011 dengan Akte Pendirian
                Notaris Hesti Sulistiati Bimasto, S.H, Akte No.11. Dengan pemegang saham Puspa Anggraini dan
                Aditya Ekatama, dan PT. Multisarana Medhitama di nahkodai oleh Puspa Anggraini sebagai
                Direkturnya.
            </p>
            <div class="row icon-boxes" style="text-align: justify">
              <div class="col-md-6">
                <i class="bx bx-receipt"></i>
                <h4>VISI</h4>
                <p>Menjadikan Pelanggan OBYEK untuk tumbuh berkarya dan menggutamakan service prima hingga terbentuk aliran kerja yang berkesinambungan .</p>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <i class="bx bx-cube-alt"></i>
                <h4>MISI</h4>
                <p>Aktif bergerak karena air yang mengalir akan cenderung jernih, sedangkan air yang diam akan keruh tergenag, Menghimpun dan membentuk Sumber daya manusia yang dibekali Iman , profesional dan bertanggung jawab .</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="struktur" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Struktur Organisasi</h2>
          <p>PT. MULTISARANA MEDHITAMA</p>
        </div>

        <div class="member">
            <h4>Puspa Anggraeni</h4>
            <span>Director</span>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="member">
              <h4>Rosmia Asma (Rossa)</h4>
              <span>Marketing</span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="member">
              <h4>Zulhaida</h4>
              <span>Finance</span>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
              <div class="member">
                <h4>Malika Rasifa Dewi</h4>
                <span>Adm</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="member">
                <h4>Erika</h4>
                <span>Adm Support Marketing</span>
              </div>
            </div>
            <div class="col-lg-3">
                <div class="member">
                  <h4>Purwoko</h4>
                  <span>Operational</span>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="member">
                  <h4>Reza Apriliani</h4>
                  <span>Cashier</span>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="member">
                <h4>Rifki Hidayatulloh</h4>
                <p>Dulhak, Reza Pahlawan R, Edo Putra, Syamsul Lomri, M. Andre Maulana</p>
                <span>Kordinator</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="member">
                <h4>Djumadi</h4>
                <span>Driver</span>
                <br><br>
              </div>
            </div>
          </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Team Section ======= -->
    <section id="rekanan" class="team section-bg">
        <div class="container mb-5">
  
            <div class="section-title">
              <h2>Rekan Kerjasama</h2>
              <p>PT. MULTISARANA MEDHITAMA</p>
            </div>
    
            <div class="row">
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Traktor Nusantara</h4>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Swadaya Harapan Nusantara</h4>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Bina Pertiwi</h4>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Gerbang Multindo Nusantara</h4>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Kasana Teknindo Gemilang</h4>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="member">
                  <h4>PT. Petrosea</h4>
                </div>
              </div>
            </div>
    
        </div>

        <hr class="container">

        <div class="container">
  
          <div class="section-title">
            <h2>Rekanan Armada</h2>
            <p>PT. MULTISARANA MEDHITAMA</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4">
              <div class="member">
                <h4>PT. Harapan Mandiri Sejahtera ( HMS )</h4>
                <span>Self Loader, Lowbed, Doliy</span>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="member">
                <h4>Raya Indo AnugrahPT.</h4>
                <span>Self Loader</span>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="member">
                <h4>PT. Harapan Putra Kita</h4>
                <span>Trailer, Fuso, Tronton</span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
                <div class="member">
                  <h4>PT. Prabu Siliwangi</h4>
                  <span>Self Loader</span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="member">
                  <h4>PT. Muara Mas</h4>
                  <span>Self Loader, Lowbed, Dolly</span>
                </div>
              </div>
          </div>
  
        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak</h2>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>JI. Usaha No. 26A Kel. Kebon Bawang Kec. Tanjung Priok, Jakarta Utara</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Operational Office</h4>
                  <p>JL Swasembada Timur VII No. 20A Kebon Bawang, Tanjung Priok, Jakarta Utara</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Telepon:</h4>
                  <p>6221-43800226 & 6221-43906389</p>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section id="resi" class="contact section-bg">
        <div class="container">
  
          <div class="section-title">
            <h2>Periksa Nomor Resi</h2>
            <p>Periksa nomor resi untuk mengecek status pengiriman barang</p>
          </div>
  
          <div class="row mt-5 justify-content-center">
            <div class="col-lg-10">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan nomor resi" required>
                </div>
                <div class="text-center mt-3"><button type="submit">Periksa</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Lumia</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Lumia</span></strong>. All Rights Reserved. Regards, <strong><span>RuanginTech</span></strong>.
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/lumia-bootstrap-business-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/home-assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/home-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/home-assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/home-assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/home-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/home-assets/vendor/waypoints/noframework.waypoints.j') }}s"></script>
  <script src="{{ asset('/home-assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/home-assets/js/main.js') }}"></script>

</body>

</html>