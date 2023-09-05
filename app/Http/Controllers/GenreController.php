<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends BaseController
{
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:genre,nama'
        ]);

        Genre::create($request->all());

        return redirect()->route('genre.index')
            ->with('success', 'Genre berhasil ditambahkan.');
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        return view('genre.show', compact('genre'));
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:genre,nama,'.$id
        ]);

        Genre::find($id)->update($request->all());

        return redirect()->route('genre.index')
            ->with('success', 'Genre berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cek apakah ada film yang masih merujuk ke genre ini
        $genre = Genre::find($id);
        $relatedFilmsCount = $genre->films()->count();
    
        if ($relatedFilmsCount > 0) {
            return redirect()->route('genre.index')
                ->with('warning', 'Data tidak dapat dihapus karena id genre masih tersimpan di tabel film.');
        }
    
        // Hapus genre jika tidak ada film yang masih merujuk
        $genre->delete();
    
        return redirect()->route('genre.index')
            ->with('success', 'Genre berhasil dihapus.');
    }        
}