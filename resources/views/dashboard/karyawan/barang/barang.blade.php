@extends('dashboard.layout.templates')

@section('konten')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
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
                                <th>Status Pengiriman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nomor_resi }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->lokasi_penerima }}</td>
                                <td>{{ $barang->tanggal_pengiriman }}</td>
                                <td>{{ $barang->armada->nama_kendaraan }}: {{ $barang->armada->plat_nomor }}</td>
                                <td>{{ $barang->titikantar->kota }}</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded-2">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-sm btn-warning mx-1 rounded-2" data-toggle="modal" data-target="#editModal{{ $barang->id }}">
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
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                                                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $barang->deskripsi }}">
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
                                                                        <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" value="{{ $barang->tanggal_pengiriman }}">
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
                                                                        <label for="lokasi_penerima" class="form-label">Tujuan (Lokasi Penerima)</label>
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
                                        <a class="btn btn-sm btn-primary rounded-2">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-success rounded-2 mx-1">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                    </div>
                                </td>
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