@extends('layouts.master')
@section('title') Wali Kelas @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Wali Kelas @endslot
@slot('title') Dashboard Wali Kelas @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('admin/wali-kelas/create') }}" type="button" class="btn btn-success btn-rounded w-lg mb-5">Tambah Wali Kelas</a>

                @if (session('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ session('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Hak Akses</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($waliKelas as $walas)
                        <tr>
                            <td>{{ $walas->nama_depan }} {{ $walas->nama_belakang }}</td>
                            <td>{{ $walas->alamat }}</td>
                            <td>{{ $walas->user->role === 1 ? 'Wali Kelas':'' }}</td>
                            <td>{{ $walas->email }}</td>
                            <td>
                                <a href="javascript:void(0)" id="deleteWaliKelas" waliKelas_id="{{ $walas->id }}"><span class="badge bg-soft-danger" data-bs-toggle="modal" data-bs-target="#myModalDelete">Hapus</span></a>
                                <a href="{{ url('admin/wali-kelas/'.$walas->id) }}"><span class="badge bg-soft-primary">Ubah</span></a>
                                <a href="javascript:void(0)" id="showWaliKelas" waliKelas_id="{{ $walas->id }}"><span class="badge bg-soft-warning" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Lihat Detail</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Wali Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
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
                <button type="button" id="destroyWaliKelas" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
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
<script src="{{URL::asset('assets/js/custom.js')}}"></script>
@endsection