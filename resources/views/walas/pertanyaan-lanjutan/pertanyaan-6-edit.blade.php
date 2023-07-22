@extends('layouts.master')
@section('title', 'Pertanyaan Lanjutan')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Pertanyaan Lanjutan 6 @endslot
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
                        <form action="{{ url('instrumen-1/pertanyaan-lanjutan-6/'.$pertanyaan6Lanjutan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card bg-warning px-3 pt-3">
                                <strong>Pertanyaan Lanjutan untuk Item yang terjawab Ya di nomor 10 dan/atau 13</strong>
                                <p class="text-light">Tekan tombol Skip dibawah jika Item terjawab Tidak untuk menuju ke pertanyaan selanjutnya</p>
                            </div>
                            <a href="{{ url('instrumen-1/pertanyaan-lanjutan-6/'. $pertanyaanUmum->id) }}" class="btn btn-danger waves-effect waves-light w-md float-end mb-2">Batal</a>
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
                                        <td>Sering tidak memperhatikan hal-hal kecil/detil, atau membuat kesalahan sepele.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_1" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_1 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_1" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_1 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Perhatiannya mudah dialihkan</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_2" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_2 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_2" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_2 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tampak tak mendengarkan apa yang dikatakan kepadanya.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_3" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_3 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_3" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_3 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sering tidak mengikuti perintah atau menaati peraturan yang seharusnya dijalankan.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_4" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_4 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_4" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_4 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kesulitan dalam pengaturan tugas/pekerjaan.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_5" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_5 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_5" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_5 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sering menghindari, tidak menyukai, atau enggan terhadap tugas-tugas yang memerlukan pemikiran dan konsentrasi (seperti pelajaran/pekerjaan rumah)</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_6" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_6 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_6" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_6 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Sering kehilangan barang-barang yang diperlukan untuk mengerjakan tugasnya.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_7" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_7 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_7" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_7 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Sering terganggu oleh suara/gerakan yang ada di sekitarnya.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_8" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_8 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_8" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_8 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Sering sudah menjawab sebelum pertanyaan yang diajukan selesai diucapkan.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_9" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_9 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_9" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_9 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Sulit menunggu giliran, tidak sabar.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_10" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_10 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_10" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_10 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Sering menyela pembicaraan atau mengacaukan permainan anak lain, atau berteriak di kelas</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_11" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_11 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_11" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_11 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Bicaranya banyak, tanpa menyesuaikan dengan suasana.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_12" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_12 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_12" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_12 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Mengerjakan hal-hal berbahaya tanpa pikir panjang.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_13" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_13 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_13" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_13 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Banyak menggerakkan tangan dan kakinya ketika duduk.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_14" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_14 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_14" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_14 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Sulit tetap duduk diam, sering meninggalkan tempat duduknya.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_15" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_15 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_15" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_15 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Sering berlari-lari atau memanjat pada situasi yang tak sesuai.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_16" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_16 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_16" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_16 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Biasanya ribut bila bermain dan sulit melakukan kegiatan dengan santai dan tenang.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_17" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_17 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_17" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_17 == 'N' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Berganti-ganti kegiatan tanpa menyelesaikannya.</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="item_18" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_18 == 'Y' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="radio" name="item_18" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_18 == 'N' ? 'checked' : '' }}>
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