<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kritik;
use App\Models\Login;
use App\Models\film;

class KritikController extends Controller
{
    public function index()
    {
        $kritik = Kritik::all();
        return view('kritik.index', compact('kritik'));
    }

    public function show($id)
    {
        // Tampilkan detail kritik berdasarkan ID
        $kritik = Kritik::findOrFail($id);
        return view('kritik.show', compact('kritik'));
    }

    public function create()
    {
        $films = Film::all();
        return view('kritik.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'point' => 'required',
            'film_id' => 'required',
        ]);
    
        $kritik = new Kritik;
        $kritik->content = $request->content;
        $kritik->point = $request->point;
        $kritik->film_id = $request->film_id;
        $kritik->save();
    
        return redirect('/kritik')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        // Temukan kritik berdasarkan ID
        $kritik = Kritik::findOrFail($id);
    
        // Muat data dari model Login
        $logins = Login::all();
    
        // Tampilkan tampilan edit kritik dan kirimkan data logins
        return view('kritik.edit', compact('kritik', 'logins'));
    }    

    public function update(Request $request, $id)
    {
        // Validasi data input dari formulir
        $request->validate([
            'content' => 'required',
            'point' => 'required|numeric',
        ]);
    
        // Temukan kritik berdasarkan ID
        $kritik = Kritik::findOrFail($id);
    
        // Perbarui data kritik berdasarkan data input dari formulir
        $kritik->content = $request->input('content');
        $kritik->point = $request->input('point');
        $kritik->save();
    
        // Redirect ke halaman yang sesuai (misalnya, daftar kritik)
        return redirect()->route('kritik.index')->with('success', 'Data berhasil diperbarui');
    }    

    public function destroy($id)
    {
        // Hapus kritik dari database berdasarkan ID
        $kritik = Kritik::findOrFail($id);
        $kritik->delete();

        // Redirect ke halaman yang sesuai (misalnya, daftar kritik)
        return redirect()->route('kritik.index');
    }
}