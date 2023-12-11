<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'armadas' => Armada::all(),
        ];
        return view('dashboard.admin.armada.armada', $data);
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
            'nama_kendaraan' => 'required',
            'plat_nomor' => 'required'
        ]);

        Armada::create($data);

        return redirect()->route('armada.index');
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
            'nama_kendaraan' => 'required',
            'plat_nomor' => 'required'
        ]);

        Armada::where('id', $id)->update($data);

        return redirect()->route('armada.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $armada = Armada::where('id', $id)->firstOrFail();
        $armada->delete();
        return redirect()->route('armada.index');
    }
}
