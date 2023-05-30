<?php

namespace App\Http\Controllers\Admin;

use App\Models\Variabel;
use App\Models\Indikator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikators = Indikator::all();
        $variabels = Variabel::all();
        return view('admin.indikator.index', compact('indikators', 'variabels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_indikator' => 'required|string',
            'variabel_id' => 'required'
        ]);

        Indikator::create([
            'nama_indikator' => $request->nama_indikator,
            'variabel_id' => $request->variabel_id,
        ]);

        return redirect()->back()->with('success_message', 'Indikator Berhasil Ditambahkan');
    }
}
