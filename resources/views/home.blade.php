<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Coming Soon - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('home-assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="{{ asset('home-assets/assets/mp4/bg.mp4') }}" type="video/mp4" /></video>
        <!-- Masthead-->
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="lh-1 mb-4">PERIKSA NOMOR RESI</h1>
                    {{-- <p class="mb-5">We're working hard to finish the development of this site. Sign up below to receive updates and to be notified when we launch!</p> --}}
                    <form action="/" method="GET" id="contactForm">
                        <div class="row input-group-newsletter">
                            <div class="col">
                                <input type="search" class="form-control" placeholder="Input nomor resi" name="search" value="{{ request('search') }}" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-success" id="submitButton" type="submit">Periksa</button>
                            </div>
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
                        <a href="{{ route('index') }}" class="btn btn-success mt-3">RESET</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('home-assets/js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>


