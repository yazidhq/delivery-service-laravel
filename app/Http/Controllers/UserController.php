<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all()
        ];  
        return view('dashboard.admin.user.pegawai', $data);
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
            'role_id' => 'required',
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create($data);

        return redirect()->route('user.index')->with(['success'=>'Berasil menambah user']);
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
        $user = User::findOrFail($id);

        $data = $this->validate($request, [
            'role_id' => 'required',
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8|confirmed'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user.index')->with(['success'=>'Berhasil mengupdate user']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->route('user.index')->with(['success'=>'Berasil menghapus user']);
    }
}
