<?php

namespace App\Http\Controllers\Walas;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Models\PertanyaanUmum;
use Illuminate\Support\Facades\DB;
use App\Models\Pertanyaan1Lanjutan;
use App\Models\Pertanyaan2Lanjutan;
use App\Models\Pertanyaan3Lanjutan;
use App\Models\Pertanyaan4Lanjutan;
use App\Models\Pertanyaan5Lanjutan;
use App\Models\Pertanyaan6Lanjutan;
use App\Models\Pertanyaan7Lanjutan;
use App\Http\Controllers\Controller;
use App\Models\InstrumenKesehatanMental;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstrumenController extends Controller
{
    public function index()
    {
        $walas = WaliKelas::where('user_id', Auth::user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $siswaId = [];
        foreach ($siswa as $key => $s) {
            array_push($siswaId, $s->id);
        }
        $pertanyaanUmums = PertanyaanUmum::whereIn('siswa_id', $siswaId)->get();

        return view('walas.instrumen.index', compact('pertanyaanUmums'));
    }

    public function create()
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->where('status', 1)->get();

        return view('walas.instrumen.create', compact('siswas'));
    }

    public function edit($id)
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $siswa = Siswa::where('id', $pertanyaanUmum->siswa_id)->first();

        return view('walas.instrumen.edit', compact('siswa', 'pertanyaanUmum'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $siswa = Siswa::where('id', $data['siswa_id'])->first();

        $rules = [
            'siswa_id' => 'integer|unique:pertanyaan_umums,siswa_id',
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
            'item_10' => 'required',
            'item_11' => 'required',
            'item_12' => 'required',
            'item_13' => 'required',
        ];

        $customMessage = [
            'siswa_id.integer' => 'Anda belum memilih siswa',
            'siswa_id.unique' => 'Instrumen sudah ditambahkan pada siswa yang anda pilih',
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
            'item_10.required' => 'Anda belum menjawab pertanyaan nomor 10',
            'item_11.required' => 'Anda belum menjawab pertanyaan nomor 11',
            'item_12.required' => 'Anda belum menjawab pertanyaan nomor 12',
            'item_13.required' => 'Anda belum menjawab pertanyaan nomor 13',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            PertanyaanUmum::create([
                'siswa_id' => $data['siswa_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
                'item_10' => $data['item_10'],
                'item_11' => $data['item_11'],
                'item_12' => $data['item_12'],
                'item_13' => $data['item_13'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1')->with('success_message', $message);
        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
            'item_10' => 'required',
            'item_11' => 'required',
            'item_12' => 'required',
            'item_13' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
            'item_10.required' => 'Anda belum menjawab pertanyaan nomor 10',
            'item_11.required' => 'Anda belum menjawab pertanyaan nomor 11',
            'item_12.required' => 'Anda belum menjawab pertanyaan nomor 12',
            'item_13.required' => 'Anda belum menjawab pertanyaan nomor 13',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            PertanyaanUmum::where('id', $id)->update([
                'siswa_id' => $data['siswa_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
                'item_10' => $data['item_10'],
                'item_11' => $data['item_11'],
                'item_12' => $data['item_12'],
                'item_13' => $data['item_13'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1')->with('success_message', $message);
        }
    }

    public function destroy($id)
    {
        PertanyaanUmum::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan1($id)
    {
        Pertanyaan1Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan2($id)
    {
        Pertanyaan2Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan3($id)
    {
        Pertanyaan3Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan4($id)
    {
        Pertanyaan4Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan5($id)
    {
        Pertanyaan5Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan6($id)
    {
        Pertanyaan6Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function destroyPertanyaanLanjutan7($id)
    {
        Pertanyaan7Lanjutan::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }

    public function getPertanyaan1($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan1Lanjutan = Pertanyaan1Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan1Lanjutan) && $pertanyaan1Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan1Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan1Lanjutan->item_7 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-1', compact('pertanyaanUmum', 'pertanyaan1Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-1', compact('pertanyaanUmum'));
    }

    public function getPertanyaan2($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan2Lanjutan = Pertanyaan2Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan2Lanjutan) && $pertanyaan2Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan2Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_7 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_8 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan2Lanjutan->item_9 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-2', compact('pertanyaanUmum', 'pertanyaan2Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-2', compact('pertanyaanUmum'));
    }

    public function getPertanyaan3($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan3Lanjutan = Pertanyaan3Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan3Lanjutan) && $pertanyaan3Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan3Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan3Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan3Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan3Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan3Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan3Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-3', compact('pertanyaanUmum', 'pertanyaan3Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-3', compact('pertanyaanUmum'));
    }

    public function getPertanyaan4($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan4Lanjutan = Pertanyaan4Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan4Lanjutan) && $pertanyaan4Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan4Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan4Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan4Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan4Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan4Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan4Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-4', compact('pertanyaanUmum', 'pertanyaan4Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-4', compact('pertanyaanUmum'));
    }

    public function getPertanyaan5($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan5Lanjutan = Pertanyaan5Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan5Lanjutan) && $pertanyaan5Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan5Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_7 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan5Lanjutan->item_8 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-5', compact('pertanyaanUmum', 'pertanyaan5Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-5', compact('pertanyaanUmum'));
    }

    public function getPertanyaan6($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan6Lanjutan = Pertanyaan6Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan6Lanjutan) && $pertanyaan6Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan6Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_7 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_8 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_9 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_10 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_11 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_12 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_13 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_14 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_15 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_16 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_17 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan6Lanjutan->item_18 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-6', compact('pertanyaanUmum', 'pertanyaan6Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-6', compact('pertanyaanUmum'));
    }

    public function getPertanyaan7($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan7Lanjutan = Pertanyaan7Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        if (!empty($pertanyaan7Lanjutan) && $pertanyaan7Lanjutan != null) {
            $y = [];
            $n = [];
            if ($pertanyaan7Lanjutan->item_1 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_2 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_3 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_4 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_5 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_6 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_7 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_8 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }
            if ($pertanyaan7Lanjutan->item_9 == 'Y') {
                array_push($y, 1);
            } else {
                array_push($n, 1);
            }

            $y = array_sum($y);
            $n = array_sum($n);
            return view('walas.pertanyaan-lanjutan.pertanyaan-7', compact('pertanyaanUmum', 'pertanyaan7Lanjutan', 'y', 'n'));
        }

        return view('walas.pertanyaan-lanjutan.pertanyaan-7', compact('pertanyaanUmum'));
    }

    public function editPertanyaan1($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan1Lanjutan = Pertanyaan1Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-1-edit', compact('pertanyaanUmum', 'pertanyaan1Lanjutan'));
    }

    public function editPertanyaan2($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan2Lanjutan = Pertanyaan2Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-2-edit', compact('pertanyaanUmum', 'pertanyaan2Lanjutan'));
    }

    public function editPertanyaan3($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan3Lanjutan = Pertanyaan3Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-3-edit', compact('pertanyaanUmum', 'pertanyaan3Lanjutan'));
    }

    public function editPertanyaan4($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan4Lanjutan = Pertanyaan4Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-4-edit', compact('pertanyaanUmum', 'pertanyaan4Lanjutan'));
    }

    public function editPertanyaan5($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan5Lanjutan = Pertanyaan5Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-5-edit', compact('pertanyaanUmum', 'pertanyaan5Lanjutan'));
    }

    public function editPertanyaan6($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan6Lanjutan = Pertanyaan6Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-6-edit', compact('pertanyaanUmum', 'pertanyaan6Lanjutan'));
    }

    public function editPertanyaan7($id)
    {
        $pertanyaanUmum = PertanyaanUmum::find($id);
        $pertanyaan7Lanjutan = Pertanyaan7Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();

        return view('walas.pertanyaan-lanjutan.pertanyaan-7-edit', compact('pertanyaanUmum', 'pertanyaan7Lanjutan'));
    }

    public function storePertanyaan1(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan1Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-2/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan2(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan2Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-3/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan3(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan3Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-4/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan4(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan4Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-5/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan5(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan5Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-6/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan6(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
            'item_10' => 'required',
            'item_11' => 'required',
            'item_12' => 'required',
            'item_13' => 'required',
            'item_14' => 'required',
            'item_15' => 'required',
            'item_16' => 'required',
            'item_17' => 'required',
            'item_18' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
            'item_10.required' => 'Anda belum menjawab pertanyaan nomor 10',
            'item_11.required' => 'Anda belum menjawab pertanyaan nomor 11',
            'item_12.required' => 'Anda belum menjawab pertanyaan nomor 12',
            'item_13.required' => 'Anda belum menjawab pertanyaan nomor 13',
            'item_14.required' => 'Anda belum menjawab pertanyaan nomor 14',
            'item_15.required' => 'Anda belum menjawab pertanyaan nomor 15',
            'item_16.required' => 'Anda belum menjawab pertanyaan nomor 16',
            'item_17.required' => 'Anda belum menjawab pertanyaan nomor 17',
            'item_18.required' => 'Anda belum menjawab pertanyaan nomor 18',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan6Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
                'item_10' => $data['item_10'],
                'item_11' => $data['item_11'],
                'item_12' => $data['item_12'],
                'item_13' => $data['item_13'],
                'item_14' => $data['item_14'],
                'item_15' => $data['item_15'],
                'item_16' => $data['item_16'],
                'item_17' => $data['item_17'],
                'item_18' => $data['item_18'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-7/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function storePertanyaan7(Request $request)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan7Lanjutan::create([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-1')->with('success_message', $message);
        }
    }

    public function updatePertanyaan1(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan1Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-1/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan2(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan2Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-2/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan3(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan3Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-3/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan4(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan4Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-4/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan5(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan5Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-5/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan6(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
            'item_10' => 'required',
            'item_11' => 'required',
            'item_12' => 'required',
            'item_13' => 'required',
            'item_14' => 'required',
            'item_15' => 'required',
            'item_16' => 'required',
            'item_17' => 'required',
            'item_18' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
            'item_10.required' => 'Anda belum menjawab pertanyaan nomor 10',
            'item_11.required' => 'Anda belum menjawab pertanyaan nomor 11',
            'item_12.required' => 'Anda belum menjawab pertanyaan nomor 12',
            'item_13.required' => 'Anda belum menjawab pertanyaan nomor 13',
            'item_14.required' => 'Anda belum menjawab pertanyaan nomor 14',
            'item_15.required' => 'Anda belum menjawab pertanyaan nomor 15',
            'item_16.required' => 'Anda belum menjawab pertanyaan nomor 16',
            'item_17.required' => 'Anda belum menjawab pertanyaan nomor 17',
            'item_18.required' => 'Anda belum menjawab pertanyaan nomor 18',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan6Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
                'item_10' => $data['item_10'],
                'item_11' => $data['item_11'],
                'item_12' => $data['item_12'],
                'item_13' => $data['item_13'],
                'item_14' => $data['item_14'],
                'item_15' => $data['item_15'],
                'item_16' => $data['item_16'],
                'item_17' => $data['item_17'],
                'item_18' => $data['item_18'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-6/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function updatePertanyaan7(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1' => 'required',
            'item_2' => 'required',
            'item_3' => 'required',
            'item_4' => 'required',
            'item_5' => 'required',
            'item_6' => 'required',
            'item_7' => 'required',
            'item_8' => 'required',
            'item_9' => 'required',
        ];

        $customMessage = [
            'item_1.required' => 'Anda belum menjawab pertanyaan nomor 1',
            'item_2.required' => 'Anda belum menjawab pertanyaan nomor 2',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_3.required' => 'Anda belum menjawab pertanyaan nomor 3',
            'item_4.required' => 'Anda belum menjawab pertanyaan nomor 4',
            'item_5.required' => 'Anda belum menjawab pertanyaan nomor 5',
            'item_6.required' => 'Anda belum menjawab pertanyaan nomor 6',
            'item_7.required' => 'Anda belum menjawab pertanyaan nomor 7',
            'item_8.required' => 'Anda belum menjawab pertanyaan nomor 8',
            'item_9.required' => 'Anda belum menjawab pertanyaan nomor 9',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            Pertanyaan7Lanjutan::where('id', $id)->update([
                'pertanyaan_umum_id' => $data['pertanyaan_umum_id'],
                'item_1' => $data['item_1'],
                'item_2' => $data['item_2'],
                'item_3' => $data['item_3'],
                'item_4' => $data['item_4'],
                'item_5' => $data['item_5'],
                'item_6' => $data['item_6'],
                'item_7' => $data['item_7'],
                'item_8' => $data['item_8'],
                'item_9' => $data['item_9'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-1/pertanyaan-lanjutan-7/' . $data['pertanyaan_umum_id'])->with('success_message', $message);
        }
    }

    public function index2()
    {
        $walas = WaliKelas::where('user_id', Auth::user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $siswaId = [];
        foreach ($siswa as $key => $s) {
            array_push($siswaId, $s->id);
        }
        $instrumenKesehatanMentals = InstrumenKesehatanMental::whereIn('siswa_id', $siswaId)->get();

        return view('walas.instrumen-2.index', compact('instrumenKesehatanMentals'));
    }

    public function create2()
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->where('status', 1)->get();

        return view('walas.instrumen-2.create', compact('siswas'));
    }

    public function edit2($id)
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $instrumenKesehatanMental = InstrumenKesehatanMental::find($id);
        $siswa = Siswa::where('id', $instrumenKesehatanMental->siswa_id)->first();

        return view('walas.instrumen-2.edit', compact('siswa', 'instrumenKesehatanMental'));
    }

    public function store2(Request $request)
    {

        $data = $request->all();

        $rules = [
            'siswa_id' => 'integer|unique:instrumen_kesehatan_mentals,siswa_id',
            'item_1a' => 'required',
            'item_1b' => 'required',
            'item_1c' => 'required',
            'item_1d' => 'required',
            'item_2a' => 'required',
            'item_2b' => 'required',
            'item_2c' => 'required',
            'item_2d' => 'required',
            'item_2e' => 'required',
            'item_2f' => 'required',
            'item_3a' => 'required',
            'item_3b' => 'required',
            'item_3c' => 'required',
            'item_3d' => 'required',
            'item_3e' => 'required',
            'item_4a' => 'required',
            'item_4b' => 'required',
            'item_4c' => 'required',
            'item_4d' => 'required',
            'item_5a' => 'required',
            'item_5b' => 'required',
            'item_5c' => 'required',
            'item_5d' => 'required',
        ];

        $customMessage = [
            'siswa_id.integer' => 'Anda belum memilih siswa',
            'siswa_id.unique' => 'Instrumen sudah ditambahkan pada siswa yang anda pilih',
            'item_1a.required' => 'Anda belum menjawab pertanyaan nomor 1.a',
            'item_1b.required' => 'Anda belum menjawab pertanyaan nomor 1.b',
            'item_1c.required' => 'Anda belum menjawab pertanyaan nomor 1.c',
            'item_1d.required' => 'Anda belum menjawab pertanyaan nomor 1.d',
            'item_2a.required' => 'Anda belum menjawab pertanyaan nomor 2.a',
            'item_2b.required' => 'Anda belum menjawab pertanyaan nomor 2.b',
            'item_2c.required' => 'Anda belum menjawab pertanyaan nomor 2.c',
            'item_2d.required' => 'Anda belum menjawab pertanyaan nomor 2.d',
            'item_2e.required' => 'Anda belum menjawab pertanyaan nomor 2.e',
            'item_2f.required' => 'Anda belum menjawab pertanyaan nomor 2.f',
            'item_3a.required' => 'Anda belum menjawab pertanyaan nomor 3.a',
            'item_3b.required' => 'Anda belum menjawab pertanyaan nomor 3.b',
            'item_3c.required' => 'Anda belum menjawab pertanyaan nomor 3.c',
            'item_3d.required' => 'Anda belum menjawab pertanyaan nomor 3.d',
            'item_3e.required' => 'Anda belum menjawab pertanyaan nomor 3.e',
            'item_4a.required' => 'Anda belum menjawab pertanyaan nomor 4.a',
            'item_4b.required' => 'Anda belum menjawab pertanyaan nomor 4.b',
            'item_4c.required' => 'Anda belum menjawab pertanyaan nomor 4.c',
            'item_4d.required' => 'Anda belum menjawab pertanyaan nomor 4.d',
            'item_5a.required' => 'Anda belum menjawab pertanyaan nomor 5.a',
            'item_5b.required' => 'Anda belum menjawab pertanyaan nomor 5.b',
            'item_5c.required' => 'Anda belum menjawab pertanyaan nomor 5.c',
            'item_5d.required' => 'Anda belum menjawab pertanyaan nomor 5.d',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            InstrumenKesehatanMental::create([
                'siswa_id' => $data['siswa_id'],
                'item_1a' => $data['item_1a'],
                'item_1b' => $data['item_1b'],
                'item_1c' => $data['item_1c'],
                'item_1d' => $data['item_1d'],
                'item_2a' => $data['item_2a'],
                'item_2b' => $data['item_2b'],
                'item_2c' => $data['item_2c'],
                'item_2d' => $data['item_2d'],
                'item_2e' => $data['item_2e'],
                'item_2f' => $data['item_2f'],
                'item_3a' => $data['item_3a'],
                'item_3b' => $data['item_3b'],
                'item_3c' => $data['item_3c'],
                'item_3d' => $data['item_3d'],
                'item_3e' => $data['item_3e'],
                'item_4a' => $data['item_4a'],
                'item_4b' => $data['item_4b'],
                'item_4c' => $data['item_4c'],
                'item_4d' => $data['item_4d'],
                'item_5a' => $data['item_5a'],
                'item_5b' => $data['item_5b'],
                'item_5c' => $data['item_5c'],
                'item_5d' => $data['item_5d'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil ditambahkan!";
            return redirect('/instrumen-2')->with('success_message', $message);
        }
    }

    public function update2(Request $request, $id)
    {

        $data = $request->all();

        $rules = [
            'item_1a' => 'required',
            'item_1b' => 'required',
            'item_1c' => 'required',
            'item_1d' => 'required',
            'item_2a' => 'required',
            'item_2b' => 'required',
            'item_2c' => 'required',
            'item_2d' => 'required',
            'item_2e' => 'required',
            'item_2f' => 'required',
            'item_3a' => 'required',
            'item_3b' => 'required',
            'item_3c' => 'required',
            'item_3d' => 'required',
            'item_3e' => 'required',
            'item_4a' => 'required',
            'item_4b' => 'required',
            'item_4c' => 'required',
            'item_4d' => 'required',
            'item_5a' => 'required',
            'item_5b' => 'required',
            'item_5c' => 'required',
            'item_5d' => 'required',
        ];

        $customMessage = [
            'item_1a.required' => 'Anda belum menjawab pertanyaan nomor 1.a',
            'item_1b.required' => 'Anda belum menjawab pertanyaan nomor 1.b',
            'item_1c.required' => 'Anda belum menjawab pertanyaan nomor 1.c',
            'item_1d.required' => 'Anda belum menjawab pertanyaan nomor 1.d',
            'item_2a.required' => 'Anda belum menjawab pertanyaan nomor 2.a',
            'item_2b.required' => 'Anda belum menjawab pertanyaan nomor 2.b',
            'item_2c.required' => 'Anda belum menjawab pertanyaan nomor 2.c',
            'item_2d.required' => 'Anda belum menjawab pertanyaan nomor 2.d',
            'item_2e.required' => 'Anda belum menjawab pertanyaan nomor 2.e',
            'item_2f.required' => 'Anda belum menjawab pertanyaan nomor 2.f',
            'item_3a.required' => 'Anda belum menjawab pertanyaan nomor 3.a',
            'item_3b.required' => 'Anda belum menjawab pertanyaan nomor 3.b',
            'item_3c.required' => 'Anda belum menjawab pertanyaan nomor 3.c',
            'item_3d.required' => 'Anda belum menjawab pertanyaan nomor 3.d',
            'item_3e.required' => 'Anda belum menjawab pertanyaan nomor 3.e',
            'item_4a.required' => 'Anda belum menjawab pertanyaan nomor 4.a',
            'item_4b.required' => 'Anda belum menjawab pertanyaan nomor 4.b',
            'item_4c.required' => 'Anda belum menjawab pertanyaan nomor 4.c',
            'item_4d.required' => 'Anda belum menjawab pertanyaan nomor 4.d',
            'item_5a.required' => 'Anda belum menjawab pertanyaan nomor 5.a',
            'item_5b.required' => 'Anda belum menjawab pertanyaan nomor 5.b',
            'item_5c.required' => 'Anda belum menjawab pertanyaan nomor 5.c',
            'item_5d.required' => 'Anda belum menjawab pertanyaan nomor 5.d',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::beginTransaction();

            InstrumenKesehatanMental::where('id', $id)->update([
                'siswa_id' => $data['siswa_id'],
                'item_1a' => $data['item_1a'],
                'item_1b' => $data['item_1b'],
                'item_1c' => $data['item_1c'],
                'item_1d' => $data['item_1d'],
                'item_2a' => $data['item_2a'],
                'item_2b' => $data['item_2b'],
                'item_2c' => $data['item_2c'],
                'item_2d' => $data['item_2d'],
                'item_2e' => $data['item_2e'],
                'item_2f' => $data['item_2f'],
                'item_3a' => $data['item_3a'],
                'item_3b' => $data['item_3b'],
                'item_3c' => $data['item_3c'],
                'item_3d' => $data['item_3d'],
                'item_3e' => $data['item_3e'],
                'item_4a' => $data['item_4a'],
                'item_4b' => $data['item_4b'],
                'item_4c' => $data['item_4c'],
                'item_4d' => $data['item_4d'],
                'item_5a' => $data['item_5a'],
                'item_5b' => $data['item_5b'],
                'item_5c' => $data['item_5c'],
                'item_5d' => $data['item_5d'],
            ]);

            DB::commit();

            // Redirect back with success message
            $message = "Instrumen berhasil diubah!";
            return redirect('/instrumen-2')->with('success_message', $message);
        }
    }

    public function destroy2($id)
    {
        InstrumenKesehatanMental::find($id)->delete();

        // Redirect back with success message
        $message = "Instrumen berhasil dihapus!";
        session()->flash('success_message', $message);
        return response()->json(['success' => true]);
    }
}
