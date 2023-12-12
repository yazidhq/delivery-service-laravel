<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\TitikAntar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;

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
}
