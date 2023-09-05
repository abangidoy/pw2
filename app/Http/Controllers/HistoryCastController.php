<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryCast;

class HistoryCastController extends BaseController
{
    public function index()
    {
        $history_casts = HistoryCast::all();
        return view('akun.index', compact('history_casts'));
    }
}
