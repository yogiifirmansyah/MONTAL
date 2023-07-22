@extends('layouts.master')
@section('title', 'Pertanyaan Lanjutan')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Pertanyaan Lanjutan 2 @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <a href="{{ url('instrumen-1') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ session('error_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
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
                                            <input class="form-check-input" type="radio" name="item_1" value="Y" {{ $pertanyaanUmum->item_1 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_1" value="N" {{ $pertanyaanUmum->item_1 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sering menabrak dan tampak meraba-raba ketika bergerak</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_2" value="Y" {{ $pertanyaanUmum->item_2 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_2" value="N" {{ $pertanyaanUmum->item_2 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tidak merespon ketika dipanggil dengan nada normal dalam jarak dekat lebih dari satu kali panggilan</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_3" value="Y" {{ $pertanyaanUmum->item_3 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_3" value="N" {{ $pertanyaanUmum->item_3 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Tidak bereaksi ketika mendengar lagu atau nyanyian</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_4" value="Y" {{ $pertanyaanUmum->item_4 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_4" value="N" {{ $pertanyaanUmum->item_4 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Lambat dalam merespon instruksi atau stimulus yang diberikan</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_5" value="Y" {{ $pertanyaanUmum->item_5 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_5" value="N" {{ $pertanyaanUmum->item_5 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Tidak menikmati bermain dengan teman sebayanya</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_6" value="Y" {{ $pertanyaanUmum->item_6 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_6" value="N" {{ $pertanyaanUmum->item_6 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Belum bisa berbicara lancar (mengucapkan kalimat sederhana) untuk seusianya</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_7" value="Y" {{ $pertanyaanUmum->item_7 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_7" value="N" {{ $pertanyaanUmum->item_7 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Sangat suka mengamati/tertarik pada objek yang spesifik seperti roda kendaraan, bagian tertentu dari mainan dan lain-lain.</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_8" value="Y" {{ $pertanyaanUmum->item_8 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_8" value="N" {{ $pertanyaanUmum->item_8 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Tidak dapat/kesulitan berinteraksi dengan anggota keluarga utama ataupun dengan anggota keluarga besar.</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_9" value="Y" {{ $pertanyaanUmum->item_9 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_9" value="N" {{ $pertanyaanUmum->item_9 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Sangat aktif untuk bergerak baik di pagi hari dan malam hari dan sering mengalami kesulitan tidur.</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_10" value="Y" {{ $pertanyaanUmum->item_10 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_10" value="N" {{ $pertanyaanUmum->item_10 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Tampak kesulitan dalam melakukan bergerak (mudah limbung, tidak sempurna, tidak lentur dan tidak terkendali).</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_11" value="Y" {{ $pertanyaanUmum->item_11 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_11" value="N" {{ $pertanyaanUmum->item_11 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Baru dapat berjalan di usia 2 tahun atau belum bisa berjalan. </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_12" value="Y" {{ $pertanyaanUmum->item_12 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_12" value="N" {{ $pertanyaanUmum->item_12 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Dalam beraktivitas perhatiannya mudah teralihkan, sehingga aktivitas utama tidak pernah selesai</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="item_13" value="Y" {{ $pertanyaanUmum->item_13 == 'Y' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" form-check">
                                            <input class="form-check-input" type="radio" name="item_13" value="N" {{ $pertanyaanUmum->item_13 == 'N' ? 'checked' : '' }} disabled>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ url('instrumen-1/pertanyaan-lanjutan-2/'.$pertanyaan2Lanjutan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card bg-warning px-3 pt-3">
                                <strong>Pertanyaan Lanjutan untuk Item yang terjawab Ya di nomor 3 dan/atau 4 dan/atau 7</strong>
                                <p class="text-light">Tekan tombol Skip dibawah jika Item terjawab Tidak untuk menuju ke pertanyaan selanjutnya</p>
                            </div>
                            <a href="{{ url('instrumen-1/pertanyaan-lanjutan-2/'. $pertanyaanUmum->id) }}" class="btn btn-danger waves-effect waves-light w-md float-end mb-2">Batal</a>
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
                                    <input type="hidden" name="pertanyaan_umum_id" value="{{ $pertanyaanUmum->id }}">
                                    <tr>
                                        <td>1</td>
                                        <td>Tidak bereaksi terhadap suara</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_1" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_1 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_1" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_1 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kosa kata yang dikuasai masih terbatas</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_2" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_2 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_2" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_2 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sering menggunakan isyarat dalam berkomunikasi</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_3" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_3 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_3" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_3 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Kurang atau tidak tanggap bila diajak bicara</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_4" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_4 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_4" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_4 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pengucapan kata tidak jelas</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_5" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_5 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_5" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_5 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kualitas suara aneh/monoton</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_6" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_6 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_6" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_6 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Sering memiringkan kepala dalam usaha mendengar </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_7" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_7 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_7" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_7 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Banyak perhatian terhadap getaran</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_8" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_8 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_8" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_8 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Keluar cairan ’nanah’ dari kedua telinga</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_9" value="Y" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_9 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_9" value="N" {{ !empty($pertanyaan2Lanjutan) != null && $pertanyaan2Lanjutan->item_9 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary waves-effect waves-light float-end">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
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