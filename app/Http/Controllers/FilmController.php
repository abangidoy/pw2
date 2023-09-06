<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\HistoryFilm;
use Carbon\Carbon;

class FilmController extends BaseController
{
    public function index()
    {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    // ...

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre_id' => 'required',
        ]);

        $film = new Film;
        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre_id; // Menggunakan genre_id yang dipilih
        $film->save();

        return redirect('/film')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $film = Film::find($id);
        if ($film) {
            return view('film.edit', compact('film'));
        } else {
            // Handle jika data tidak ditemukan
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre_id' => 'required',
        ]);

        $film = Film::find($id);
        $oldData = $film->toArray(); // Simpan data sebelum diubah

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect('/film')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $oldData = $film->toArray(); // Simpan data sebelum dihapus

        $film->delete();
        return redirect('/film')->with('success', 'Data berhasil dihapus');
    }
}
