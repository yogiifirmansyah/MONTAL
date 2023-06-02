@extends('layouts.master')
@section('title') Kemandirian Perilaku @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Kemandirian Perilaku @endslot
@slot('title') Dashboard Kemandirian Perilaku @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" id="addLaporanPerkembangan" class="btn btn-success btn-rounded w-lg mb-5" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Kemandirian Perilaku</button>

                @if (session('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ session('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Indikator</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($laporanPerkembangan as $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->siswa->nama_depan }} {{ $laporan->siswa->nama_belakang }}</td>
                            <td>{{ $laporan->indikator->nama_indikator }}</td>
                            <td>{{ $laporan->nilai }}</td>
                            <td>
                                <a href="javascript:void(0)" id="deleteLaporanPerkembangan" LaporanPerkembangan_id="{{ $laporan->id }}"><span class="badge bg-soft-danger" data-bs-toggle="modal" data-bs-target="#myModalDelete">Hapus</span></a>
                                <a href="javascript:void(0)" id="editLaporanPerkembangan" LaporanPerkembangan_id="{{ $laporan->id }}" data-bs-toggle="modal" data-bs-target="#myModal"><span class="badge bg-soft-primary">Ubah</span></a>
                                <a href="javascript:void(0)" id="showSiswa" siswa_id="{{ $laporan->siswa->id }}"><span class="badge bg-soft-warning" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Lihat Detail Siswa</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<!-- Store and Update modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form id="LaporanPerkembanganData">
                    <div id="errorMessage"></div>

                    <input type="hidden" id="LaporanPerkembanganId" value="">

                    <div class="mb-3 row" id="siswaStore">
                        <label class="col-md-3 col-form-label">Nama Siswa</label>
                        <div class="col-md-9">
                            <select class="form-select" id="siswaId">
                                <option>Pilih Siswa</option>
                                @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row" id="siswaUpdate">
                        <label class="col-md-3 col-form-label">Nama Siswa</label>
                        <div class="col-md-9">
                            <input type="text" id="namaSiswa" class="form-control" readonly value="">
                        </div>
                    </div>

                    <div class="mb-3 row" id="indikatorStore">
                        <label class="col-md-3 col-form-label">Indikator</label>
                        <div class="col-md-9">
                            <select class="form-select" id="indikatorId">
                                <option>Pilih Indikator</option>
                                @foreach ($indikators as $indikator)
                                <option value="{{ $indikator->id }}">{{ $indikator->nama_indikator }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row" id="indikatorUpdate">
                        <label class="col-md-3 col-form-label">Indikator</label>
                        <div class="col-md-9">
                            <input type="text" id="namaIndikator" class="form-control" readonly value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Nilai</label>
                        <div class="col-md-9">
                            <input type="number" id="nilai" class="form-control" value="" min="0.01" max="4" step="0.01" placeholder="0,01 - 4,00">
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" id="updateLaporanPerkembangan" class="btn btn-info waves-effect waves-light">Update</button>
                <button type="button" id="storeLaporanPerkembangan" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                <button type="button" id="destroyLaporanPerkembangan" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Large modal Show Siswa -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@endsection

@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<!-- Varying Modal Content js -->
<script src="{{URL::asset('assets/js/pages/modal.init.js')}}"></script>
<!-- Custom JS -->
<script src="{{URL::asset('assets/js/walas/custom.js')}}"></script>
@endsection