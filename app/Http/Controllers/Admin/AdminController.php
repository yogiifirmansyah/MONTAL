<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Variabel;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome()
    {
        $variabels = Variabel::count();
        $indikators = Indikator::count();
        $walikelas = WaliKelas::count();
        $kelas = Kelas::count();
        $siswa = Siswa::count();
        return view('dashboard', ["status" => "Admin Loggin Successfully."], compact(
            'variabels',
            'indikators',
            'walikelas',
            'kelas',
            'siswa'
        ));
    }
}
