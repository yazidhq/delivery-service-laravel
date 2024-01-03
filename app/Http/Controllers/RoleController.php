<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->nama == 'admin') {
            $data = [
                'roles' => Role::all(),
            ];
            return view('dashboard.admin.role.role', $data);
        }
        return redirect()->route('dashboard');
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
        if (auth()->user()->role->nama == 'admin') {
            $data = $this->validate($request, [
                'nama' => 'required'
            ]);

            Role::create($data);

            return redirect()->route('role.index')->with(['success' => 'Berhasil menambah role baru']);
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
        if (auth()->user()->role->nama == 'admin') {
            $data = $this->validate($request, [
                'nama' => 'required'
            ]);

            Role::where('id', $id)->update($data);

            return redirect()->route('role.index')->with(['success' => 'Berhasil merubah role']);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role->nama == 'admin') {
            $role = Role::where('id', $id)->firstOrFail();
            $role->delete();
            return redirect()->route('role.index')->with(['success' => 'Berhasil menghapus role']);
        }
        return redirect()->route('dashboard');
    }
}
