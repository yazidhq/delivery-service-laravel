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
                                <th>Resi</th>
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
                                <td>{{ $barang->armada->nama_kendaraan }}</td>
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
                                                        {{-- <form action="{{ route('armada.update', $armada->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="nama_kendaraan">Jenis Kendaraan</label>
                                                                <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" value="{{ $armada->nama_kendaraan }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="plat_nomor">Plat Nomor</label>
                                                                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="{{ $armada->plat_nomor }}">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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