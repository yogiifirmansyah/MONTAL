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
            'variabelName' => 'required|string'
        ]);

        $variabel = new Variabel;
        $variabel->nama_variabel = $request->variabelName;
        $variabel->save();

        session()->flash('success_message', 'Data Berhasil Ditambahkan');
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $variabel = Variabel::find($id);
        return response()->json($variabel);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'variabelName' => 'required|string'
        ]);

        $variabel = Variabel::find($id);
        $variabel->nama_variabel = $request->variabelName;
        $variabel->save();

        session()->flash('success_message', 'Data Berhasil Diubah');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Variabel::where('id', $id)->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }
}
