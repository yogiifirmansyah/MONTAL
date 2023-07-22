@extends('layouts.master')
@section('title', 'Instrumen 2')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Instrumen Checklist Kesehatan Mental @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <a href="{{ url('dashboard') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            @if (!empty($instrumenKesehatanMental))
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3 bg-light">
                            <span><strong>Nama&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</span>
                            <span><strong>NISN&nbsp;&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->nisn }}</span>
                            <span><strong>Kelas&nbsp;&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->kelas->nama_kelas }}</span>
                        </div>
                    </div>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="20%">Aspek</th>
                                <th width="65%">Indikator</th>
                                <th width="5%">Ya</th>
                                <th width="5%">Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="4">1</td>
                                <td rowspan="4">Kognitif</td>
                                <td>a. Apakah saya sering merasa tertekan oleh pikiran negatif atau obsesif?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_1a" value="Y" {{ $instrumenKesehatanMental->item_1a == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_1a" value="N" {{ $instrumenKesehatanMental->item_1a == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Apakah saya mengalami perubahan drastis dalam pikiran saya?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_1b" value="Y" {{ $instrumenKesehatanMental->item_1b == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_1b" value="N" {{ $instrumenKesehatanMental->item_1b == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Apakah saya mengalami pikiran atau dorongan untuk menyakiti diri sendiri atau orang lain?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_1c" value="Y" {{ $instrumenKesehatanMental->item_1c == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_1c" value="N" {{ $instrumenKesehatanMental->item_1c == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>d. Apakah saya merasa sulit untuk mengendalikan pikiran atau impuls?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_1d" value="Y" {{ $instrumenKesehatanMental->item_1d == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_1d" value="N" {{ $instrumenKesehatanMental->item_1d == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="6">2</td>
                                <td rowspan="6">Emosi</td>
                                <td>a. Apakah saya merasa sedih atau cemas secara konstan?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2a" value="Y" {{ $instrumenKesehatanMental->item_2a == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2a" value="N" {{ $instrumenKesehatanMental->item_2a == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Apakah saya sering merasa tertekan atau stres?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2b" value="Y" {{ $instrumenKesehatanMental->item_2b == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2b" value="N" {{ $instrumenKesehatanMental->item_2b == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Apakah saya merasa kehilangan minat atau kegairahan dalam kegiatan yang biasanya saya nikmati?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2c" value="Y" {{ $instrumenKesehatanMental->item_2c == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2c" value="N" {{ $instrumenKesehatanMental->item_2c == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>d. Apakah saya mengalami perubahan drastis dalam pola tidur saya (terlalu banyak tidur atau kurang tidur)?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2d" value="Y" {{ $instrumenKesehatanMental->item_2d == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2d" value="N" {{ $instrumenKesehatanMental->item_2d == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>e. Apakah saya sering merasa lelah atau kekurangan energi?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2e" value="Y" {{ $instrumenKesehatanMental->item_2e == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2e" value="N" {{ $instrumenKesehatanMental->item_2e == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>f. Apakah saya merasa sedih atau cemas secara konstan?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_2f" value="Y" {{ $instrumenKesehatanMental->item_2f == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_2f" value="N" {{ $instrumenKesehatanMental->item_2f == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="5">3</td>
                                <td rowspan="5">Perilaku</td>
                                <td>a. Apakah saya mengalami perubahan dalam pola makan saya (makan berlebihan atau kehilangan nafsu makan)?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_3a" value="Y" {{ $instrumenKesehatanMental->item_3a == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_3a" value="N" {{ $instrumenKesehatanMental->item_3a == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Apakah saya sering mengisolasi diri dari teman dan keluarga?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_3b" value="Y" {{ $instrumenKesehatanMental->item_3b == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_3b" value="N" {{ $instrumenKesehatanMental->item_3b == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Apakah saya menggunakan alkohol, obat-obatan, atau perilaku adiktif lainnya sebagai koping?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_3c" value="Y" {{ $instrumenKesehatanMental->item_3c == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_3c" value="N" {{ $instrumenKesehatanMental->item_3c == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>d. Apakah saya merasa sulit untuk berkonsentrasi atau membuat keputusan?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_3d" value="Y" {{ $instrumenKesehatanMental->item_3d == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_3d" value="N" {{ $instrumenKesehatanMental->item_3d == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>e. Apakah saya sering merasa cemas atau gelisah tanpa alasan yang jelas?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_3e" value="Y" {{ $instrumenKesehatanMental->item_3e == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_3e" value="N" {{ $instrumenKesehatanMental->item_3e == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="4">4</td>
                                <td rowspan="4">Sosial</td>
                                <td>a. Apakah saya merasa sulit untuk berinteraksi dengan orang lain?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_4a" value="Y" {{ $instrumenKesehatanMental->item_4a == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_4a" value="N" {{ $instrumenKesehatanMental->item_4a == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Apakah saya merasa bahwa hubungan dengan orang lain terganggu?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_4b" value="Y" {{ $instrumenKesehatanMental->item_4b == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_4b" value="N" {{ $instrumenKesehatanMental->item_4b == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Apakah saya sering merasa terasing atau merasa tidak dipahami oleh orang lain?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_4c" value="Y" {{ $instrumenKesehatanMental->item_4c == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_4c" value="N" {{ $instrumenKesehatanMental->item_4c == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>d. Apakah saya mengalami perubahan dalam hubungan intim saya?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_4d" value="Y" {{ $instrumenKesehatanMental->item_4d == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_4d" value="N" {{ $instrumenKesehatanMental->item_4d == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="4">5</td>
                                <td rowspan="4">Fisik</td>
                                <td>a. Apakah saya mengalami sakit kepala atau migrain yang sering?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_5a" value="Y" {{ $instrumenKesehatanMental->item_5a == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_5a" value="N" {{ $instrumenKesehatanMental->item_5a == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Apakah saya merasa nyeri tubuh secara terus-menerus tanpa penyebab yang jelas?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_5b" value="Y" {{ $instrumenKesehatanMental->item_5b == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_5b" value="N" {{ $instrumenKesehatanMental->item_5b == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>c. Apakah saya mengalami masalah tidur, seperti insomnia atau terbangun di malam hari?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_5c" value="Y" {{ $instrumenKesehatanMental->item_5c == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_5c" value="N" {{ $instrumenKesehatanMental->item_5c == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>d. Apakah saya merasa gelisah, seperti sering menggerakkan kaki atau tangan?</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="item_5d" value="Y" {{ $instrumenKesehatanMental->item_5d == 'Y' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class=" form-check">
                                        <input class="form-check-input" type="radio" name="item_5d" value="N" {{ $instrumenKesehatanMental->item_5d == 'N' ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="card-body">
                <h1 class="text-center p-5">NOT FOUND</h1>
            </div>
            @endif
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection
@section('script')
<!-- jquery-steps js -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
@endsection