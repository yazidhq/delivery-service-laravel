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
        $data = [
            'kategoris' => Kategori::all(),
            'armadas' => Armada::all(),
            'titikantars' => TitikAntar::all(),
        ];
        return view('dashboard.karyawan.barang.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::where('id', $id)->firstOrFail();
        $barang->delete();
        return redirect()->route('barang.index')->with(['success' => 'Berhasil menghapus Barang']);
    }

    /**
     * Change status of is_perjalanan
     */
    public function updateIsPerjalanan($id)
    {
        $barang = Barang::find($id);

        if($barang->is_perjalanan == 0){
            if ($barang) {
                $barang->is_perjalanan = true;
                $barang->save();
                return redirect()->back()->with('success', 'Berhasil mengubah Status Perjalanan');
            } else {
                return redirect()->back()->with('error', 'Barang tidak ditemukan');
            }
        }else {
            if ($barang) {
                $barang->is_perjalanan = false;
                $barang->save();
                return redirect()->back()->with('success', 'Berhasil mengubah Status Perjalanan');
            } else {
                return redirect()->back()->with('error', 'Barang tidak ditemukan');
            }
        }
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
     * Creating pdf surat jalan barang
     */
    public function generateSuratJalan($id)
    {
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
}
