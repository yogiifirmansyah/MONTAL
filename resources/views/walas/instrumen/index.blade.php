@extends('layouts.master')
@section('title') Instrumen 1 @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Dashboard Siswa @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ url('instrumen-1/create') }}" class="btn btn-success btn-rounded w-lg mb-5">Tambah Instrumen</a>

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
                            <th>Nama</th>
                            <th>Pertanyaan Lanjutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pertanyaanUmums as $pu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pu->siswa->nama_depan }} {{ $pu->siswa->nama_belakang }}</td>
                            <td><?php
                                foreach (App\Models\PertanyaanUmum::pertanyaanLanjutan($pu->id) as $key => $value) {
                                    echo $value . ',';
                                }
                                ?></td>
                            <td>
                                <a href="javascript:void(0)" id="deletePertanyaanUmum" PertanyaanUmum_id="{{ $pu->id }}" data-bs-toggle="modal" data-bs-target="#myModalDelete"><span class="badge bg-soft-danger">Hapus</span></a>
                                <a href="{{ url('/instrumen-1/'.$pu->id) }}"><span class="badge bg-soft-primary">Ubah</span></a>
                                <a href="{{ url('/instrumen-1/pertanyaan-lanjutan-1/'.$pu->id) }}"><span class="badge bg-soft-warning">Pertanyaan Lanjutan</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
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
                <button type="button" id="destroyPertanyaanUmum" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
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
<!-- Custom JS -->
<script src="{{URL::asset('assets/js/walas/custom.js')}}"></script>
@endsection