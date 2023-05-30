<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variabel;
use Illuminate\Http\Request;

class VariabelController extends Controller
{
    public function index()
    {
        $variabels = Variabel::all();
        return view('admin.variabel.index', compact('variabels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_variabel' => 'required|string'
        ]);

        Variabel::create([
            'nama_variabel' => $request->nama_variabel
        ]);

        return redirect()->back()->with('success_message', 'Variabel Berhasil Ditambahkan');
    }
}
