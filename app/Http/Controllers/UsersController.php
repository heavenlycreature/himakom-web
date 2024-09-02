<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'admin')->orderBy('created_at', 'desc')->get()->map(function ($user) {
            return [
                'name' => $user->name,
                'username' => $user->username,
                'created_at' => $user->created_at->format('d-m-Y'),
            ];
        });
        
        return view('admin.users.index', [
            'title' => 'List Pengguna',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.form.create', ['title' => 'Tambah Pengguna']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'role' => 'required|string|in:admin',
            'bio' => 'required|string',
            'profile' => 'nullable|image|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->hasFile('profile')) {
            $imagePath = $request->file('profile')->store('users-profile');
        }
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'bio' => $request->bio,
            'profile' => $imagePath,
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna baru berhasil dibuat.');

    }


    public function edit($username)
    {
        $user = User::Where('username', $username)->firstOrFail();

        return view('admin.users.form.edit', [
            'title' => 'Edit Pengguna',
            'user' => $user,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
        $user = User::Where('username', $username)->firstOrFail();

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'required|string',
            'profile' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        
        if($request->hasFile('profile')){
            if($request->oldImage){
                Storage::delete($request->oldImage); 
            }
            $imagePath = $request->file('profile')->store('users-profile');
            $user->profile = $imagePath;
        }
        // Update data pengguna
        $user->name = $request->name;
        $user->username = $request->username;
        $user->bio = $request->bio;

    
        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        // Redirect atau tampilkan pesan sukses
        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        if ($user->profile) {
            Storage::delete($user->profile);
        }
        $user->delete();

        return redirect(route('users.index'))->with('success', 'Pengguna berhasil dihapus!');
  
    }
}
