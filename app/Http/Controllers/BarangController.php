<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\TitikAntar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'barangs' => Barang::all(),
            'kategoris' => Kategori::all(),
            'armadas' => Armada::all(),
            'titikantars' => TitikAntar::all(),
        ];
        return view('dashboard.karyawan.barang.barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin'){
            $data = [
                'kategoris' => Kategori::all(),
                'armadas' => Armada::all(),
                'titikantars' => TitikAntar::all(),
            ];
            return view('dashboard.karyawan.barang.tambah', $data);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin'){
            $data = $this->validate($request, [
                'nama_barang' => 'required',
                'deskripsi' => 'required',
                'kategori_id' => 'required',
                'tanggal_pengiriman' => 'required',
                'armada_id' => 'required',
                'nama_pengirim' => 'required',
                'nama_penerima' => 'required',
                'nomor_penerima' => 'required',
                'kota_penerima' => 'required',
                'lokasi_penerima' => 'required',
                'titikantar_id' => 'required',
            ]);

            Barang::create($data);

            return redirect()->route('barang.index')->with(['success' => 'Berhasil memasukkan Barang']);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin'){
            $data = $this->validate($request, [
                'nama_barang' => 'required',
                'deskripsi' => 'required',
                'kategori_id' => 'required',
                'tanggal_pengiriman' => 'required',
                'armada_id' => 'required',
                'nama_pengirim' => 'required',
                'nama_penerima' => 'required',
                'nomor_penerima' => 'required',
                'kota_penerima' => 'required',
                'lokasi_penerima' => 'required',
                'titikantar_id' => 'required',
                'is_perjalanan' => 'required',
            ]);

            $barang = Barang::findOrFail($id);

            $barang->update($data);

            return redirect()->route('barang.index')->with(['success' => 'Berhasil merubah data Barang']);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin'){
            $barang = Barang::where('id', $id)->firstOrFail();
            $barang->delete();
            return redirect()->route('barang.index')->with(['success' => 'Berhasil menghapus Barang']);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Update status perjalanan (titikantar_id)
     */
    public function updateTitikAntar(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->titikantar_id = $request->input('titikantar_id');
        $barang->save();

        return redirect()->back()->with('success', 'Titik Antar berhasil diperbarui');
    }

    /**
     * Change status of is_perjalanan & is_sampai
     */
    public function updateStatus(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $status = $request->input('status');

        if ($status === 'sudah_diterima') {
            $barang->is_sampai = true;
            $barang->is_perjalanan = false;
        } elseif ($status === 'dalam_perjalanan') {
            $barang->is_sampai = false;
            $barang->is_perjalanan = true;
        } elseif ($status === 'di_titik_antar') {
            $barang->is_sampai = false;
            $barang->is_perjalanan = false;
        }

        $barang->save();

        return redirect()->back()->with('success', 'Status barang berhasil diperbarui');
    }

    /**
     * Creating pdf surat jalan barang
     */
    public function generateSuratJalan($id)
    {
        if (auth()->user()->role->nama == 'pegawai' || auth()->user()->role->nama == 'admin'){
            $barang = Barang::findOrFail($id);

            $pdf = App::make('dompdf.wrapper');

            // Configure DomPDF
            $pdf->getDomPDF()->set_option("isHtml5ParserEnabled", true);
            $pdf->getDomPDF()->set_option("isPhpEnabled", true);

            // Load view
            $pdf->loadView('surat-jalan', compact('barang'));

            // Set paper orientation to landscape
            $pdf->setPaper('A4', 'landscape');

            // Stream the PDF to the browser
            return $pdf->stream('surat-jalan-'.$barang->id.'.pdf');
        }
        return redirect()->route('dashboard');
    }

    /**
     * export barang data to excel
     */
    public function exportToExcel()
    {
        $barangs = Barang::all();

        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'NOMOR RESI');
        $sheet->setCellValue('B1', 'NAMA BARANG');
        $sheet->setCellValue('C1', 'DESKRIPSI');
        $sheet->setCellValue('D1', 'KATEGORI BARANG');
        $sheet->setCellValue('E1', 'NAMA PENGIRIM');
        $sheet->setCellValue('F1', 'NAMA PENERIMA');
        $sheet->setCellValue('G1', 'NOMOR PENERIMA');
        $sheet->setCellValue('H1', 'ARMADA PENGIRIMAN');
        $sheet->setCellValue('I1', 'KOTA TUJUAN');
        $sheet->setCellValue('J1', 'LOKASI LENGKAP TUJUAN');
        $sheet->setCellValue('K1', 'TANGGAL PENGIRIMAN');

        // Set data
        $row = 2;
        foreach ($barangs as $barang) {
            $sheet->setCellValueExplicit('A' . $row, $barang->nomor_resi, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('B' . $row, $barang->nama_barang);
            $sheet->setCellValue('C' . $row, $barang->deskripsi);
            $sheet->setCellValue('D' . $row, $barang->kategori->nama_kategori);
            $sheet->setCellValue('E' . $row, $barang->nama_pengirim);
            $sheet->setCellValue('F' . $row, $barang->nama_penerima);
            $sheet->setCellValueExplicit('G' . $row, $barang->nomor_penerima, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('H' . $row, $barang->armada->nama_kendaraan);
            $sheet->setCellValue('I' . $row, $barang->kota_penerima);
            $sheet->setCellValue('J' . $row, $barang->lokasi_penerima);
            $sheet->setCellValue('K' . $row, $barang->tanggal_pengiriman->format('d-m-Y'));

            $row++;
        }

        // Set size column following the data
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set format for header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4285F4'],
            ],
        ];

        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Set format for data
        $dataStyle = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D3D3D3'],
            ],
        ];

        $sheet->getStyle('A2:' . $sheet->getHighestDataColumn() . $row)->applyFromArray($dataStyle);

        // Create a new Excel object
        $writer = new Xlsx($spreadsheet);

        // current date
        $currentDate = now()->format('d-m-y');

        // Set response headers
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="data-barang-' . $currentDate . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Save file to output
        $writer->save('php://output');
    }

}
