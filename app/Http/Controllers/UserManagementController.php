<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('group')
            ->when($request->cari, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->cari . '%');
            })
            ->latest()
            ->paginate(10);

        return view('akun.pengguna.index', compact('users'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('akun.pengguna.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('akun-pengguna.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $akun_pengguna)
    {
        $groups = Group::all();
        return view('akun.pengguna.edit', ['user' => $akun_pengguna, 'groups' => $groups]);
    }

    public function update(Request $request, User $akun_pengguna)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $akun_pengguna->id,
            'password' => 'nullable|string|min:6',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = bcrypt($validated['password']);
        }

        $akun_pengguna->update($validated);

        return redirect()->route('akun-pengguna.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function toggleAktif(User $akun_pengguna)
    {
        $akun_pengguna->update(['aktif' => !$akun_pengguna->aktif]);
        return back()->with('success', 'Status akun berhasil diubah.');
    }

    public function destroy(User $akun_pengguna)
    {
        $akun_pengguna->delete();
        return redirect()->route('akun-pengguna.index')->with('success', 'Akun berhasil dihapus.');
    }

    public function informasi()
{
    $users = User::with('group')->latest()->get();
    $pengunaAktif = $users->where('aktif', true)->count();
    $penggunaTidakAktif = $users->where('aktif', false)->count();

    return view('akun.pengguna.informasi', compact('users', 'pengunaAktif', 'penggunaTidakAktif'));
}
}