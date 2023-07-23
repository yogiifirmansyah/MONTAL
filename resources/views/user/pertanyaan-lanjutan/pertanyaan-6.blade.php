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
            <a href="{{ url('dashboard') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h4>Pertanyaan Lanjutan 6
                            <a href="{{ url('detail-instrumen-1/pertanyaan-lanjutan-7/'.$pertanyaanUmum->siswa_id) }}" class="btn btn-primary waves-effect waves-light w-md float-end">Selanjutnya</a>
                            <a href="{{ url('detail-instrumen-1/pertanyaan-lanjutan-5/'.$pertanyaanUmum->siswa_id) }}" class="btn btn-dark waves-effect waves-light w-md float-end mx-1">Sebelumnya</a>
                        </h4>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-warning p-2">
                            Pertanyaan Lanjutan untuk Item yang terjawab Ya di nomor 10 dan/atau 13
                        </div>
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
                            <td>Sering tidak memperhatikan hal-hal kecil/detil, atau membuat kesalahan sepele.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_1 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_1 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Perhatiannya mudah dialihkan</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_2 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_2 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tampak tak mendengarkan apa yang dikatakan kepadanya.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_3 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_3 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Sering tidak mengikuti perintah atau menaati peraturan yang seharusnya dijalankan.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_4 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_4 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Kesulitan dalam pengaturan tugas/pekerjaan.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_5 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_5 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Sering menghindari, tidak menyukai, atau enggan terhadap tugas-tugas yang memerlukan pemikiran dan konsentrasi (seperti pelajaran/pekerjaan rumah)</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_6 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_6 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Sering kehilangan barang-barang yang diperlukan untuk mengerjakan tugasnya.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_7" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_7 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_7" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_7 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Sering terganggu oleh suara/gerakan yang ada di sekitarnya.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_8" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_8 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_8" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_8 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Sering sudah menjawab sebelum pertanyaan yang diajukan selesai diucapkan.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_9" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_9 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_9" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_9 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Sulit menunggu giliran, tidak sabar.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_10" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_10 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_10" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_10 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Sering menyela pembicaraan atau mengacaukan permainan anak lain, atau berteriak di kelas</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_11" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_11 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_11" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_11 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Bicaranya banyak, tanpa menyesuaikan dengan suasana.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_12" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_12 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_12" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_12 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Mengerjakan hal-hal berbahaya tanpa pikir panjang.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_13" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_13 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_13" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_13 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Banyak menggerakkan tangan dan kakinya ketika duduk.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_14" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_14 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_14" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_14 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Sulit tetap duduk diam, sering meninggalkan tempat duduknya.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_15" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_15 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_15" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_15 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Sering berlari-lari atau memanjat pada situasi yang tak sesuai.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_16" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_16 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_16" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_16 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Biasanya ribut bila bermain dan sulit melakukan kegiatan dengan santai dan tenang.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_17" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_17 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_17" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_17 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Berganti-ganti kegiatan tanpa menyelesaikannya.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_18" value="Y" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_18 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_18" value="N" {{ !empty($pertanyaan6Lanjutan) != null && $pertanyaan6Lanjutan->item_18 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        @if (!empty($pertanyaan6Lanjutan))
                        <tr>
                            <td colspan="2"><strong>Total Checklist</strong></td>
                            <td><b>{{ $y6 }}</b></td>
                            <td><b>{{ $n6 }}</b></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end card -->
</div>
<!-- end col -->
</div>

<!-- Delete modal content -->
<div id="myModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <h6>Anda Yakin ingin menghapus data?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">No</button>
                <button type="button" id="destroyPertanyaanLanjutan6" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
<!-- jquery-steps js -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
<!-- Custom JS -->
<script src="{{URL::asset('assets/js/walas/custom.js')}}"></script>
@endsection