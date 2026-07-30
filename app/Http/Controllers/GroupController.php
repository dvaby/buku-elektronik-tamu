<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::when($request->cari, function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->cari . '%');
            })
            ->latest()
            ->paginate(10);

        return view('akun.grup.index', compact('groups'));
    }

    public function create()
    {
        return view('akun.grup.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'akses_penuh' => 'boolean',
        ]);

        Group::create($validated);

        return redirect()->route('grup.index')->with('success', 'Grup berhasil ditambahkan.');
    }

    public function edit(Group $grup)
    {
        return view('akun.grup.edit', ['group' => $grup]);
    }

    public function update(Request $request, Group $grup)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'akses_penuh' => 'boolean',
        ]);

        $grup->update($validated);

        return redirect()->route('grup.index')->with('success', 'Grup berhasil diperbarui.');
    }

    public function destroy(Group $grup)
    {
        $grup->delete();
        return redirect()->route('grup.index')->with('success', 'Grup berhasil dihapus.');
    }
}