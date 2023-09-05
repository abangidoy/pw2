<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\HistoryCast;
use Carbon\Carbon;

class CastController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cast = Cast::all();
        return view('cast.index',compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $cast = new Cast;
        $cast->nama = $request->nama;
        $cast->umur = $request->umur;
        $cast->bio = $request->bio;
        $cast->save();

        // Simpan riwayat perubahan dengan waktu Jakarta
        HistoryCast::create([
            'cast_id' => $cast->id,
            'action' => 'Created', // Simpan aksi 'Created'
            'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
            'nama' => $cast->nama, // Simpan nama dari entitas Cast
            'umur' => $cast->umur, // Simpan umur dari entitas Cast
            'bio' => $cast->bio,   // Simpan bio dari entitas Cast
        ]);

        return redirect('/cast')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cast = Cast::find($id);
        if ($cast) {
            return view('cast.edit', compact('cast'));
        } else {
            // Handle jika data tidak ditemukan
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
         $request->validate([
             'nama' => 'required',
             'umur' => 'required',
             'bio' => 'required',
         ]);
 
         $cast = Cast::find($id);
         $oldData = $cast->toArray(); // Simpan data sebelum diubah
 
         $cast->nama = $request->nama;
         $cast->umur = $request->umur;
         $cast->bio = $request->bio;
         $cast->save();
 
         // Simpan riwayat perubahan dengan waktu Jakarta
         HistoryCast::create([
             'cast_id' => $cast->id,
             'action' => 'Updated',
             'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
             'nama' => $oldData['nama'],
             'umur' => $oldData['umur'],
             'bio' => $oldData['bio'],
         ]);
 
         return redirect('/cast')->with('success', 'Data berhasil diperbarui');
     }
 
     public function destroy($id)
     {
         $cast = Cast::findOrFail($id);
         $oldData = $cast->toArray(); // Simpan data sebelum dihapus
 
         // Simpan riwayat perubahan dengan waktu Jakarta
         HistoryCast::create([
             'cast_id' => $oldData['id'],
             'action' => 'Deleted',
             'time' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'), // Waktu di Jakarta
             'nama' => $oldData['nama'],
             'umur' => $oldData['umur'],
             'bio' => $oldData['bio'],
         ]);
 
         $cast->delete();
         return redirect('/cast')->with('success', 'Data berhasil dihapus');
     }
 }
