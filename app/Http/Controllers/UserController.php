<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Hapus pengguna!';
        $text = "Apa kamu yakin ingin menghapus?";
        confirmDelete($title, $text);

        $users = User::where('id', '!=', auth()->id())->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $user = User::find($user->id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);

        // if password is being updated
        if ($request->password) {
            $request->validate([
                'password' => 'min:6',
            ]);

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'role' => $request->role,
            ]);
        }
        return redirect()->route('user.index')->with('toast_success', 'Pengguna berhasil diubah!');
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
