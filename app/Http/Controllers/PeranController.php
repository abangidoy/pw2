<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peran;
use App\Models\Cast;
use App\Models\Film;

class PeranController extends Controller
{
    public function index()
    {
        $perans = Peran::all(); // Menggunakan $perans, bukan $peran
        return view('peran.index', compact('perans'));
    }

    public function create()
    {
        $casts = Cast::all();
        $films = Film::all();
        return view('peran.create', compact('casts', 'films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'cast_id' => 'required',
            'film_id' => 'required',
        ]);

        Peran::create([
            'nama' => $request->nama,
            'cast_id' => $request->cast_id,
            'film_id' => $request->film_id,
        ]);

        return redirect()->route('peran.index')->with('success', 'Peran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peran = Peran::findOrFail($id);
        $casts = Cast::all();
        $films = Film::all();
        return view('peran.edit', compact('peran', 'casts', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'cast_id' => 'required',
            'film_id' => 'required',
        ]);

        $peran = Peran::findOrFail($id);
        $peran->update([
            'nama' => $request->nama,
            'cast_id' => $request->cast_id,
            'film_id' => $request->film_id,
        ]);

        return redirect()->route('peran.index')->with('success', 'Peran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peran = Peran::findOrFail($id);
        $peran->delete();

        return redirect()->route('peran.index')->with('success', 'Peran berhasil dihapus.');
    }
}