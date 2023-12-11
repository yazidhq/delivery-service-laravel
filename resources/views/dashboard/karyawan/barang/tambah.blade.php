@extends('dashboard.layout.templates')

@section('konten')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
        <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Tambah Barang
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input data pada form berikut</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Jenis Barang</label>
                                    <input type="text" class="form-control" id="kategori_id" name="kategori_id">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman">
                                </div>
                                <div class="mb-3">
                                    <label for="armada_id" class="form-label">Armada Pengiriman</label>
                                    <input type="text" class="form-control" id="armada_id" name="armada_id" placeholder="Bisa diisi nanti">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima">
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_penerima" class="form-label">Nomor Penerima</label>
                                    <input type="text" class="form-control" id="nomor_penerima" name="nomor_penerima">
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi_penerima" class="form-label">Tujuan (Lokasi Penerima)</label>
                                    <input type="text" class="form-control" id="lokasi_penerima" name="lokasi_penerima">
                                </div>
                                <div class="mb-3">
                                    <label for="titikantar_id" class="form-label">Status Pengiriman</label>
                                    <input type="text" class="form-control" id="titikantar_id" name="titikantar_id">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection