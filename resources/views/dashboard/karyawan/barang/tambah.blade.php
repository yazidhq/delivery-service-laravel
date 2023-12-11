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
                                    <label for="kategori_id" class="form-label">Jenis/ Kategori Barang</label>
                                    <select name="kategori_id" class="form-control">
                                        <option value="">Pilih Jenis Barang</option>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('kategori_id')==$kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman">
                                </div>
                                <div class="mb-3">
                                    <label for="armada_id" class="form-label">Armada Pengiriman</label>
                                    <select name="armada_id" class="form-control">
                                        <option value="">Pilih Armada</option>
                                        @foreach ($armadas as $armada)
                                        <option value="{{ $armada->id }}" {{ old('armada_id')==$armada->id ? 'selected' : '' }}>
                                            {{ $armada->nama_kendaraan }}: {{ $armada->plat_nomor }}
                                        </option>
                                        @endforeach
                                    </select>
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
                                    <select name="titikantar_id" class="form-control">
                                        <option value="">Pilih Status</option>
                                        @foreach ($titikantars as $titikantar)
                                        <option value="{{ $titikantar->id }}" {{ old('titikantar_id')==$titikantar->id ? 'selected' : '' }}>
                                            Barang berada di titik antar: {{ $titikantar->kota }}
                                        </option>
                                        @endforeach
                                    </select>
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