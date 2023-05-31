@extends('layouts.master')
@section('title') Variabel @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Variabel @endslot
@slot('title') Dashboard Variabel @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" id="addVariabel" class="btn btn-success btn-rounded w-lg mb-5" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Variabel</button>

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
                            <th>Nama Variabel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($variabels as $variabel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $variabel->nama_variabel }}</td>
                            <td>
                                <a href="javascript:void(0)" id="deleteVariabel" variabel_id="{{ $variabel->id }}"><span class="badge bg-soft-danger" data-bs-toggle="modal" data-bs-target="#myModalDelete">Hapus</span></a>
                                <a href="javascript:void(0)" id="editVariabel" variabel_id="{{ $variabel->id }}" data-bs-toggle="modal" data-bs-target="#myModal"><span class="badge bg-soft-primary">Ubah</span></a>
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
                <form id="variabelData">
                    <div id="errorMessage"></div>

                    <input type="hidden" id="variabelId">

                    <div class="mb-3 row">
                        <label for="variabelName" class="col-md-3 col-form-label">Nama Variabel</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="variabelName" value="">
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" id="updateVariabel" class="btn btn-primary waves-effect waves-light">Update</button>
                <button type="button" id="storeVariabel" class="btn btn-primary waves-effect waves-light">Save</button>
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
                <button type="button" id="destroyVariabel" class="btn btn-danger waves-effect waves-light">Yes, Delete!</button>
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
<script src="{{URL::asset('assets/js/custom.js')}}"></script>
@endsection