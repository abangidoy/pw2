<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all(); // Mengambil semua data Profile dari database
        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat profile (jika diperlukan)
        return view('profile.create');
    }

    public function store(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            'umur' => 'required|numeric',
            'bio' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Membuat objek Profile
        $profile = new Profile();
        $profile->umur = $request->input('umur');
        $profile->bio = $request->input('bio');
        $profile->alamat = $request->input('alamat');

        // Mengatur login_id dengan ID pengguna yang sedang login
        $profile->login_id = Auth::user()->id;

        // Menyimpan profile ke database
        $profile->save();

        // Redirect atau berikan respons sukses
        return redirect()->route('profile.index')->with('success', 'Profile telah berhasil dibuat.');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit profile (jika diperlukan)
        $profile = Profile::findOrFail($id);

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input dari formulir
        $request->validate([
            'umur' => 'required|numeric',
            'bio' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Perbarui profile yang ada di database berdasarkan ID
        $profile = Profile::findOrFail($id);
        $profile->umur = $request->input('umur');
        $profile->bio = $request->input('bio');
        $profile->alamat = $request->input('alamat');

        // Menyimpan perubahan profile ke database
        $profile->save();

        // Redirect ke halaman yang sesuai (misalnya, halaman profil)
        return redirect()->route('profile.index')->with('success', 'Profile telah berhasil diperbarui.');
    }
}