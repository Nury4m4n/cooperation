<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        return view('admin.admin_role.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.admin-role.edit_modal', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'is_admin' => 'required|max:255',
        ]);

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->route('admin-role.index')->with('error', 'User tidak ditemukan.');
        }

        $user->is_admin = $request->is_admin;

        if ($user->save()) {
            return redirect()->route('admin-role.index')->with('success', 'User berhasil diperbaharui.');
        } else {
            return redirect()->route('admin-role.index')->with('error', 'Gagal memperbaharui user.');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin-role.index')->with('error', 'User tidak ditemukan.');
        }

        if ($user->delete()) {
            return redirect()->route('admin-role.index')->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->route('admin-role.index')->with('error', 'Gagal menghapus user.');
        }
    }
}
