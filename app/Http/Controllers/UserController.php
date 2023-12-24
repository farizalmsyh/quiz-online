<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Member;
use App\Model\Submission;
use \Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index() {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        $users = User::all();
        return view('component.user.index', compact('users'));
    }

    public function create() {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        return view('component.user.create');
    }

    public function save(Request $request) {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Berhasil', 'Pengguna berhasil dibuat!');
        return redirect()->route('user');
    }

    public function edit($id) {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        $user = User::findOrFail($id);
        return view('component.user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        Alert::success('Berhasil', 'Pengguna berhasil diubah!');
        return redirect()->route('user');
    }
    
    public function delete(Request $request) {
        if (Auth::user()->role != 1) {
            abort(403, 'Sorry !! You are Unauthorized!');
        }
        $user = User::findOrFail($request->id);
        $checkMem = Member::Where('user_id', $user->id)->count();
        $checkSub = Submission::Where('user_id', $user->id)->count();
        if($checkMem > 0 && $checkSub > 0) {
            Alert::success('Gagal', 'Pengguna telah digunakan!');
            return redirect()->route('user');
        }
        $user->delete();
        Alert::success('Berhasil', 'Pengguna berhasil dihapus!');
        return redirect()->route('user');
    }
}
