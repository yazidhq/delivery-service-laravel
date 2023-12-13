<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medhitama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Favicons -->
  <link href="{{ asset('/logo.png') }}" rel="icon">
  <link href="{{ asset('/logo.png') }}" rel="apple-touch-icon">

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
      <a href="#resi" class="btn-get-started scrollto">Periksa Nomor Resi</a>
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
          <div class="col-lg-6" data-aos="fade-left">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Ekspedisi Darat</a></h4>
              <p>Mengerjakan untuk trucking ke wilayah Jawa, NTB dan NTT</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="icon-box" data-aos="fade-right">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Ekspedisi Laut</a></h4>
              <p>Mengerjakan job di Kalimantan, Sulawesi dan Papua</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="tentang" class="about section-bg" data-aos="fade-up">
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
    <section id="struktur" class="team" data-aos="fade-left">
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
    <section id="kerja" class="team section-bg" data-aos="fade-right">
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

        <hr class="container" id="armada">

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
    <section id="kontak" class="contact" data-aos="fade-up">
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
                <form action="/#resi" method="GET" role="form">
                    <div class="form-group mt-3">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Masukkan nomor resi" value="{{ request('search') }}" required>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-info text-light rounded-1">Periksa</button>
                    </div>
                </form>                
                @if ($barangs)
                    @forelse($barangs as $barang)
                        <ul class="list-group mt-3">
                            <li class="list-group-item">Nomor resi : {{ $barang->nomor_resi }}</li>
                            <li class="list-group-item">Barang : {{ Str::ucfirst($barang->nama_barang) }}</li>
                            <li class="list-group-item">
                                @if ($barang->is_sampai && !$barang->is_perjalanan)
                                    Barang telah sampai dan diterima
                                @elseif(!$barang->is_sampai && $barang->is_perjalanan)
                                    Barang sedang dalam perjalanan dari {{ Str::ucfirst($barang->titikantar->kota) }}
                                @elseif(!$barang->is_sampai && !$barang->is_perjalanan)
                                    Posisi Barang : berada di checkpoint {{ Str::ucfirst($barang->titikantar->kota) }}
                                @endif
                            </li>
                            <li class="list-group-item">Armada Kendaraan : {{ Str::ucfirst($barang->armada->nama_kendaraan) }} | {{ Str::upper($barang->armada->plat_nomor) }}</li>
                            <li class="list-group-item">Tujuan Pengiriman : {{ Str::ucfirst($barang->lokasi_penerima) }}</li>
                            <li class="list-group-item">Tanggal Kirim : {{ $barang->tanggal_pengiriman->format('d-m-Y') }}</li>
                        </ul>
                    @empty
                        <li class="list-group-item list-group-item-danger">Barang tidak ditemukan</li>
                    @endforelse
                    <div class="text-center mt-3">
                      <a href="/#resi" class="btn btn-info rounded-1 text-light">RESET</a>
                    </div>
                @endif

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

          <div class="col-lg-8 col-md-6 footer-contact">
            <h3>PT. MULTISARANA MEDHITAMA</h3>
            <p>
            JI. Usaha No. 26A Kel. Kebon Bawang Kec. Tanjung Priok, Jakarta Utara <br>
              <strong>Telepon: </strong>6221-43800226 & 6221-43906389<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('index') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#bidang">Bidang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#tentang">Tentang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#kontak">Kontak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#resi">Periksa Resi</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Rekan Kerja</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#kerja">Rekan Kerja</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#armada">Rekan Armada</a></li>
            </ul>
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

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>