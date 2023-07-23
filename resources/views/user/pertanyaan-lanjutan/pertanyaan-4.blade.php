@extends('layouts.master')
@section('title', 'Pertanyaan Lanjutan')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Pertanyaan Lanjutan 4 @endslot
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
                        <h4>Pertanyaan Lanjutan 4
                            <a href="{{ url('detail-instrumen-1/pertanyaan-lanjutan-5/'.$pertanyaanUmum->siswa_id) }}" class="btn btn-primary waves-effect waves-light w-md float-end">Selanjutnya</a>
                            <a href="{{ url('detail-instrumen-1/pertanyaan-lanjutan-3/'.$pertanyaanUmum->siswa_id) }}" class="btn btn-dark waves-effect waves-light w-md float-end mx-1">Sebelumnya</a>
                        </h4>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-warning p-2">
                            Pertanyaan Lanjutan untuk Item yang terjawab Ya di nomor 2 dan/atau 11 dan/atau 12
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
                        <input type="hidden" name="pertanyaan_umum_id" value="{{ $pertanyaanUmum->id }}">
                        <tr>
                            <td>1</td>
                            <td>Anggota gerak tubuh kaku/ lemah/lumpuh</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_1 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_1" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_1 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kesulitan dalam melakukan gerakan (tidak sempurna, tidak lentur dan tidak terkendali)</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_2 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_2" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_2 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Terdapat bagian anggota gerak yang tidak lengkap/tidak sempurna/lebih kecil dari biasanya</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_3 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_3" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_3 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Terdapat cacat pada alat gerak</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_4 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_4" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_4 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Jari-jari tangan kaku dan tidak dapat menggenggam</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_5 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_5" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_5 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Kesulitan pada saat berdiri/ berjalan/duduk, dan menunjukkan sikap tubuh tidak normal.</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="Y" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_6 == 'Y' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check">
                                    <input class="form-check-input" type="radio" name="item_6" value="N" {{ !empty($pertanyaan4Lanjutan) != null && $pertanyaan4Lanjutan->item_6 == 'N' ? 'checked' : '' }} disabled>
                                </div>
                            </td>
                        </tr>
                        @if (!empty($pertanyaan4Lanjutan))
                        <tr>
                            <td colspan="2"><strong>Total Checklist</strong></td>
                            <td><b>{{ $y4 }}</b></td>
                            <td><b>{{ $n4 }}</b></td>
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
                <button type="button" id="destroyPertanyaanLanjutan4" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
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