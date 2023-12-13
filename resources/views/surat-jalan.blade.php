<!DOCTYPE html>
<html lang="en">
<head>
  <title>Surat Jalan</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    font-size: 15px;
    margin: 0;
    padding: 0;
    }

    .surat-jalan {
    width: 8.27in;
    margin: 20px auto; /* Memberikan margin di sekitar surat-jalan */
    padding: 10px; /* Menambahkan padding untuk memberikan ruang di sekitar isi surat-jalan */
    border: 1px solid #ccc;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header {
    padding: 30px;
    background-color: #f5f5f5;
    text-align: center;
    }

    .header img {
    width: 120px;
    margin-bottom: 15px;
    }

    .header h1 {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
    }

    .header h2 {
    font-size: 20px;
    font-weight: bold;
    margin: 0;
    color: #555;
    }

    .body {
    padding: 30px;
    }

    .body table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    }

    .body table th,
    .body table td {
    border: 1px solid #ccc;
    padding: 15px;
    text-align: left;
    }

    .body table th {
    background-color: #f5f5f5;
    }

    .footer {
    padding: 30px;
    border-top: 1px solid #ccc;
    background-color: #f5f5f5;
    text-align: center;
    }

    .footer p {
    margin: 0;
    }
  </style>
</head>
<body>

  <div class="surat-jalan">
    <div class="header">
      <h1>PT. MULTISARANA MEDHITAMA</h1>
      <h2>SURAT JALAN</h2>
    </div>

    <div class="body">
      <table>
        <tr>
          <th>Nomor Resi</th>
          <td>{{ $barang->nomor_resi }}</td>
          <th>Barang</th>
          <td>{{ Str::ucfirst($barang->nama_barang) }}</td>
        </tr>
        <tr>
          <th>Kategori Barang</th>
          <td>{{ $barang->kategori->nama_kategori }}</td>
          <th>Deskripsi Barang</th>
          <td>{{ $barang->deskripsi }}</td>
        </tr>
        <tr>
          <th>Armada Pengiriman</th>
          <td>{{ $barang->armada->nama_kendaraan }}: {{ $barang->armada->plat_nomor }}</td>
          <th>Tanggal Pengiriman</th>
          <td>{{ $barang->tanggal_pengiriman->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Kota Tujuan</th>
          <td>{{ $barang->kota_penerima }}</td>
          <th>Alamat Tujuan</th>
          <td>{{ $barang->lokasi_penerima }}</td>
        </tr>
      </table>

      <p>BARANG SUDAH DITERIMA DALAM KEADAAN BAIK</p>
    </div>

    <div class="footer">
      <p>{{ Str::ucfirst($barang->lokasi_penerima) }}</p>
      <p>Penerima, {{ Str::ucfirst($barang->nama_penerima) }}</p><br><br>
      <p>___________________</p>
    </div>
  </div>

</body>
</html>
