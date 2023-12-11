<?php

namespace App\Http\Controllers;

use App\Models\TitikAntar;
use Illuminate\Http\Request;

class TitikAntarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'titikantars' => TitikAntar::all(),
        ];
        return view('dashboard.admin.titikantar.titikantar', $data);
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
            'kota' => 'required',
            'kode_pos' => 'required',
            'alamat_lengkap' => 'required',
            'kontak_nama' => 'required',
            'kontak_nomor' => 'required'
        ]);

        TitikAntar::create($data);

        return redirect()->route('titikantar.index');
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
            'kota' => 'required',
            'kode_pos' => 'required',
            'alamat_lengkap' => 'required',
            'kontak_nama' => 'required',
            'kontak_nomor' => 'required'
        ]);

        TitikAntar::where('id', $id)->update($data);

        return redirect()->route('titikantar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $titikantar = TitikAntar::where('id', $id)->firstOrFail();
        $titikantar->delete();
        return redirect()->route('titikantar.index');
    }
}