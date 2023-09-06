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
        $kritiks = Kritik::with('login')->get();
        return view('kritik.index', compact('kritiks'));
    }

    public function show($id)
    {

        $kritik = Kritik::findOrFail($id);
        return view('kritik.show', compact('kritik'));
    }

    public function create()
    {
        $logins = Login::all();
        $filmIds = Film::pluck('id');
    
        return view('kritik.create', compact('logins', 'filmIds'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required',
            'point' => 'required|numeric',
            'film_id' => 'required',
        ]);

        $kritik = new Kritik();
        $kritik->content = $request->input('content');
        $kritik->point = $request->input('point');
    
        $kritik->login_id = Auth::user()->id;
    
        $kritik->film_id = $request->input('film_id');
    
        $kritik->save();
    
        return redirect()->route('kritik.index')->with('success', 'Kritik telah berhasil ditambahkan.');
    }

    public function edit($id)
    {

        $kritik = Kritik::findOrFail($id);

        $logins = Login::all();
        $films = Film::all();


        return view('kritik.edit', compact('kritik', 'logins', 'films'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'content' => 'required',
            'point' => 'required|numeric',
            'film_id' => 'required',
        ]);
    

        $kritik = Kritik::findOrFail($id);
        $kritik->update($request->all());
    
        return redirect()->route('kritik.index');
    }

    public function destroy($id)
    {

        $kritik = Kritik::findOrFail($id);
        $kritik->delete();

        return redirect()->route('kritik.index');
    }
}