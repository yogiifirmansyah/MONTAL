@extends('layouts.master')
@section('title') Instrumen 2 @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Simontal @endslot
@slot('title') Dashboard Siswa @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ url('instrumen-2/create') }}" class="btn btn-success btn-rounded w-lg mb-5">Tambah Instrumen</a>

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
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($instrumenKesehatanMentals as $ikm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ikm->siswa->nama_depan }} {{ $ikm->siswa->nama_belakang }}</td>
                            <td>
                                <a href="javascript:void(0)" id="deleteInstrumen2" Instrumen2_id="{{ $ikm->id }}" data-bs-toggle="modal" data-bs-target="#myModalDelete"><span class="badge bg-soft-danger">Hapus</span></a>
                                <a href="{{ url('/instrumen-2/'.$ikm->id) }}"><span class="badge bg-soft-primary">Ubah</span></a>
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
                <button type="button" id="destroyInstrumen2" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
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
@endsection