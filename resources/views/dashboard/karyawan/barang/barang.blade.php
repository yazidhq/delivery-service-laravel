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
                                <th>Nama Penerima</th>
                                <th>Tujuan</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Status Pengiriman</th>
                                <th>Armada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nomor_resi }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->nama_penerima }}</td>
                                <td>{{ $barang->lokasi_penerima }}</td>
                                <td>{{ $barang->tanggal_pengiriman }}</td>
                                <td>{{ $barang->titikantar_id }}</td>
                                <td>{{ $barang->armada_id }}</td>
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