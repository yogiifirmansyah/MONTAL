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

        $request->validate(
            [
                'indikatorName' => 'required|string',
                'variabelId' => 'required|integer'
            ],
            [
                'indikatorName.required' => 'Nama indikator tidak boleh kosong!',
                'variabelId.integer' => 'Belum memilih variabel!',
            ]
        );

        $indikator = new Indikator;
        $indikator->nama_indikator = $request->indikatorName;
        $indikator->variabel_id = $request->variabelId;
        $indikator->save();

        session()->flash('success_message', 'Indikator Berhasil Ditambahkan');
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $indikator = Indikator::find($id);

        return response()->json($indikator);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'indikatorName' => 'required|string',
                'variabelId' => 'required|integer'
            ],
            [
                'indikatorName.required' => 'Nama indikator tidak boleh kosong!',
                'variabelId.integer' => 'Belum memilih variabel!',
            ]
        );

        $indikator = Indikator::find($id);
        $indikator->nama_indikator = $request->indikatorName;
        $indikator->variabel_id = $request->variabelId;
        $indikator->save();

        session()->flash('success_message', 'Indikator Berhasil Diubah');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Indikator::where('id', $id)->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }
}
