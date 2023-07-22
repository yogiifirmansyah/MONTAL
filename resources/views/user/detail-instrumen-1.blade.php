@extends('layouts.master')
@section('title', 'Detail Instrumen 1')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') INSTRUMEN DETEKSI DINI ANAK BERKEBUTUHAN KHUSUS @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <a href="{{ url('dashboard') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            @if (!empty($pertanyaanUmum))
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card p-3 bg-light">
                            <span><strong>Nama&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</span>
                            <span><strong>NISN&nbsp;&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->nisn }}</span>
                            <span><strong>Kelas&nbsp;&nbsp;:</strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $siswa->kelas->nama_kelas }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Pertanyaan Umum
                            <a href="{{ url('detail-instrumen-1/pertanyaan-lanjutan-1/'.$pertanyaanUmum->siswa_id) }}" class="btn btn-primary waves-effect waves-light w-md float-end">Selanjutnya</a>
                        </h4>
                    </div>
                </div>
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2" width="10%">No</th>
                            <th rowspan="2" width="70%">Item</th>
                            <th colspan="2" width="20%">Respon</th>
                        </tr>
                        <tr>
                            <th>Ya</th>
                            <th>Tidak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Organ mata mengalami kerusakan (bola mata berwarna keruh/bersisik/kering baik salah satu atau keduanya)</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_1 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_1 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sering menabrak dan tampak meraba-raba ketika bergerak</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_2 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_2 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tidak merespon ketika dipanggil dengan nada normal dalam jarak dekat lebih dari satu kali panggilan</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_3 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_3 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Tidak bereaksi ketika mendengar lagu atau nyanyian</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_4 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_4 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lambat dalam merespon instruksi atau stimulus yang diberikan</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_5 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_5 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Tidak menikmati bermain dengan teman sebayanya</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_6 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_6 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Belum bisa berbicara lancar (mengucapkan kalimat sederhana) untuk seusianya</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_7" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_7 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_7" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_7 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Sangat suka mengamati/tertarik pada objek yang spesifik seperti roda kendaraan, bagian tertentu dari mainan dan lain-lain.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_8" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_8 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_8" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_8 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Tidak dapat/kesulitan berinteraksi dengan anggota keluarga utama ataupun dengan anggota keluarga besar.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_9" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_9 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_9" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_9 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Sangat aktif untuk bergerak baik di pagi hari dan malam hari dan sering mengalami kesulitan tidur.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_10" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_10 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_10" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_10 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Tampak kesulitan dalam melakukan bergerak (mudah limbung, tidak sempurna, tidak lentur dan tidak terkendali).</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_11" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_11 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_11" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_11 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Baru dapat berjalan di usia 2 tahun atau belum bisa berjalan. </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_12" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_12 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_12" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_12 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Dalam beraktivitas perhatiannya mudah teralihkan, sehingga aktivitas utama tidak pernah selesai</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_13" value="Y" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_13 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_13" value="N" {{ !empty($pertanyaanUmum) && $pertanyaanUmum->item_13 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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