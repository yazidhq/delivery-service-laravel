<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'kategoris' => Kategori::all(),
        ];
        return view('dashboard.karyawan.kategori.kategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        Kategori::create($data);

        return redirect()->route('kategori.index')->with(['success' => 'Berhasil menambah katagori Barang']);
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
            'nama_kategori' => 'required',
            'deskripsi' => 'required'   
        ]);

        Kategori::where('id', $id)->update($data);

        return redirect()->route('kategori.index')->with(['success' => 'Berhasil mengubah katagori Barang']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::where('id', $id)->firstOrFail();
        foreach ($kategori->barang as $barang) {
            $barang->delete();
        }
        $kategori->delete();
        return redirect()->route('kategori.index')->with(['success' => 'Berhasil menghapus katagori Barang']);
    }
}
