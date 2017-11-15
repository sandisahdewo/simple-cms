<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use App\Model\Admin\Grup;

class UserController extends Controller
{

    public function index() {
        $users = User::with('grup')
                     ->where('username', '!=', 'developer')
                     ->get();
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        $lists_grup = Grup::all()->pluck('grup', 'id');
        return view('admin.user.create', compact('lists_grup'));
    }

    public function store(Request $request) {
        $validate =  $this->validate($request, [
            'username' => 'required|max:255',
            'nama' => 'required|max:255',
            'email' => 'email|max:255|unique:user',
            'password' => 'required|min:3|max:255|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create($request->all());
        return back()->with('successMessage', 'User baru berhasil disimpan.');
    }

    public function edit(User $user) {
        $lists_grup = Grup::all()->pluck('grup', 'id');
        return view('admin.user.edit', compact('user', 'lists_grup'));
    }

    public function update(Request $request, User $user) {
        $this->validate($request, [
            'username' => 'required|max:255',
            'nama' => 'required|max:255',
            'email' => 'email|max:255|unique:user,email,'.$id
        ]);

        $user->update($request->all());
        return back()->with('successMessage', 'User berhasil diperbarui.');
    }

    public function destroy(User $user) {
        $user->delete();
        return back()->with('successMessage', 'User berhasil dihapus.');
    }
}
