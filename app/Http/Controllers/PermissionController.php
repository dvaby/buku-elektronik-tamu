<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::when($request->cari, function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->cari . '%');
            })
            ->latest()
            ->paginate(10);

        return view('akun.role.index', compact('permissions'));
    }

    public function create()
    {
        return view('akun.role.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Permission::create($validated);

        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit(Permission $role)
    {
        return view('akun.role.edit', ['permission' => $role]);
    }

    public function update(Request $request, Permission $role)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $role->update($validated);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy(Permission $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }
}