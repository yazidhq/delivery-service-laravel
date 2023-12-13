@extends('dashboard.layout.templates')

@section('konten')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        @if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin')
        <div class="align-items-end">
            <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-pencil-alt fa-sm text-white-50"></i>
                Tambah Barang
            </a>
            <a href="{{ route('export-barang-excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Ekspor ke Excel
            </a>
            <a href="https://docs.google.com/spreadsheets/d/1z-Evf2IBBdPMAd9aTIemZrU7M7YnYPDF62j7FlKaHT8/edit#gid=0" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" target="_blank">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Spreadsheet
            </a>
        </div>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Terdapat field edit kosong..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor Resi</th>
                                <th>Barang</th>
                                <th>Tujuan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Armada</th>
                                <th>Posisi Barang</th>
                                <th>Status Perjalanan</th>
                                @if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                            <tr class="@if($barang->is_sampai && !$barang->is_perjalanan) border-success @elseif(!$barang->is_sampai && $barang->is_perjalanan) border-warning @elseif(!$barang->is_sampai && !$barang->is_perjalanan) border-primary @endif">
                                <td>{{ $barang->nomor_resi }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kota_penerima }}</td>
                                <td>{{ $barang->tanggal_pengiriman->format('d-m-Y') }}</td>
                                <td>{{ $barang->armada->nama_kendaraan }}: {{ $barang->armada->plat_nomor }}</td>
                                <td>
                                    @if ($barang->is_sampai && !$barang->is_perjalanan)
                                        <select class="form-control" disabled>
                                            <option>Diterima</option>
                                        </select>
                                    @elseif(!$barang->is_sampai && $barang->is_perjalanan)
                                        <select class="form-control" disabled>
                                            <option>Perjalanan</option>
                                        </select>
                                    @elseif(!$barang->is_sampai && !$barang->is_perjalanan)
                                        <form action="{{ route('update-titik-antar', ['id' => $barang->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="titikantar_id" class="form-control" onchange="this.form.submit()">
                                                <option hidden value="{{ $barang->titikantar_id }}">{{ $barang->titikantar->kota }}</option>
                                                @foreach ($titikantars as $titikantar)
                                                    <option value="{{ $titikantar->id }}">{{ $titikantar->kota }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('update-status', ['id' => $barang->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="sudah_diterima" @if ($barang->is_sampai && !$barang->is_perjalanan) selected @endif>Barang sudah diterima</option>
                                            <option value="dalam_perjalanan" @if (!$barang->is_sampai && $barang->is_perjalanan) selected @endif>Barang dalam perjalanan</option>
                                            <option value="di_titik_antar" @if (!$barang->is_sampai && !$barang->is_perjalanan) selected @endif>Barang di titik antar</option>
                                        </select>
                                    </form>
                                </td>
                                @if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin')
                                <td>
                                    <div class="input-group mb-3">
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded-2 mx-1 my-1">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-sm btn-warning mx-1 my-1 rounded-2" data-toggle="modal" data-target="#editModal{{ $barang->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="is_perjalanan" value="{{ $barang->is_perjalanan }}">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                                                                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $barang->deskripsi }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kategori_id" class="form-label">Jenis/ Kategori Barang</label>
                                                                        <select name="kategori_id" class="form-control">
                                                                            <option hidden value="{{ $barang->kategori_id }}">{{ $barang->kategori->nama_kategori }}</option>
                                                                            @foreach ($kategoris as $kategori)
                                                                            <option value="{{ $kategori->id }}" {{ old('kategori_id')==$kategori->id ? 'selected' : '' }}>
                                                                                {{ $kategori->nama_kategori }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                                                                        <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" value="{{ old('tanggal_pengiriman', $barang->tanggal_pengiriman ? \Carbon\Carbon::parse($barang->tanggal_pengiriman)->toDateString() : '') }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="armada_id" class="form-label">Armada Pengiriman</label>
                                                                        <select name="armada_id" class="form-control">
                                                                            <option hidden value="{{ $barang->armada_id }}">{{ $barang->armada->nama_kendaraan }}: {{ $barang->armada->plat_nomor }}</option>
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
                                                                        <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="{{ $barang->nama_pengirim }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                                                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ $barang->nama_penerima }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="nomor_penerima" class="form-label">Nomor Penerima</label>
                                                                        <input type="text" class="form-control" id="nomor_penerima" name="nomor_penerima" value="{{ $barang->nomor_penerima }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kota_penerima" class="form-label">Kota Penerima</label>
                                                                        <input type="text" class="form-control" id="kota_penerima" name="kota_penerima" value="{{ $barang->kota_penerima }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="lokasi_penerima" class="form-label">Lokasi Lengkap Penerima</label>
                                                                        <input type="text" class="form-control" id="lokasi_penerima" name="lokasi_penerima" value="{{ $barang->lokasi_penerima }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="titikantar_id" class="form-label">Status Pengiriman</label>
                                                                        <select name="titikantar_id" class="form-control">
                                                                            <option value="{{ $barang->titikantar_id }}">Barang berada di titik antar: {{ $barang->titikantar->kota }}</option>
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
                                        <button class="btn btn-sm btn-primary rounded-2 mx-1 my-1" data-toggle="modal" data-target="#lihatModal{{ $barang->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="lihatModal{{ $barang->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="lihatModalLabel">Detail Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item"><strong>Nomor Resi : </strong>{{ $barang->nomor_resi }}</li>
                                                            <li class="list-group-item"><strong>Nama Barang : </strong>{{ $barang->nama_barang }}</li>
                                                            <li class="list-group-item"><strong>Deskripsi : </strong>{{ $barang->deskripsi }}</li>
                                                            <li class="list-group-item"><strong>Tanggal Kirim : </strong>{{ $barang->tanggal_pengiriman }}</li>
                                                            <li class="list-group-item"><strong>Jenis Barang : </strong>{{ $barang->kategori->nama_kategori }}</li>
                                                            <li class="list-group-item"><strong>Armada Pengiriman : </strong>{{ $barang->armada->nama_kendaraan }}</li>
                                                            <li class="list-group-item"><strong>Kota Tujuan : </strong>{{ $barang->kota_penerima }}</li>
                                                            <li class="list-group-item"><strong>Alamat : </strong>{{ $barang->lokasi_penerima }}</li>
                                                            <li class="list-group-item"><strong>Nama Pengirim : </strong>{{ $barang->nama_pengirim }}</li>
                                                            <li class="list-group-item"><strong>Nama Penerima : </strong>{{ $barang->nama_penerima }}</li>
                                                            <li class="list-group-item"><strong>Nomor Penerima : </strong>{{ $barang->nomor_penerima }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('surat-jalan', ['id' => $barang->id]) }}" class="btn btn-sm btn-success rounded-2 mx-1 my-1" target="_blank">
                                            <i class="bi bi-printer"></i>
                                        </a>                                        
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection