<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
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
    return view('film.create');
    }

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
    $film->genre_id = $request->genre_id;
    $film->save();

    // Simpan riwayat perubahan dengan waktu Jakarta
    // HistoryFilm::create([
    //     'film_id' => $film->id,
    //     'action' => 'Created', // Simpan aksi 'Created'
    //     'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
    //     'judul' => $film->judul, // Simpan judul dari entitas Film
    //     'ringkasan' => $film->ringkasan, // Simpan ringkasan dari entitas Film
    //     'tahun' => $film->tahun,   // Simpan tahun dari entitas Film
    //     'poster' => $film->poster,   // Simpan poster dari entitas Film
    //     'genre_id' => $film->genre_id,   // Simpan genre_id dari entitas Film
    // ]);

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

        // Simpan riwayat perubahan dengan waktu Jakarta
        // HistoryFilm::create([
        //     'film_id' => $film->id,
        //     'action' => 'Updated',
        //     'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
        //     'judul' => $oldData['judul'],
        //     'ringkasan' => $oldData['ringkasan'],
        //     'tahun' => $oldData['tahun'],
        //     'poster' => $oldData['poster'],
        //     'genre_id' => $oldData['genre_id'],
        // ]);

        return redirect('/film')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $oldData = $film->toArray(); // Simpan data sebelum dihapus

        // Simpan riwayat perubahan dengan waktu Jakarta
        // HistoryFilm::create([
        //     'film_id' => $oldData['id'],
        //     'action' => 'Deleted',
        //     'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
        //     'judul' => $oldData['judul'],
        //     'ringkasan' => $oldData['ringkasan'],
        //     'tahun' => $oldData['tahun'],
        //     'poster' => $oldData['poster'],
        //     'genre_id' => $oldData['genre_id'],
        // ]);

        $film->delete();
        return redirect('/film')->with('success', 'Data berhasil dihapus');
    }
}
