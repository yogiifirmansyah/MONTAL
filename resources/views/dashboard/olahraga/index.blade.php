@extends('layouts.master')
@section('title', 'Olahraga')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Olahraga @endslot
        @slot('title') Dashboard Olahraga @endslot
    @endcomponent

    <!-- Nav tabs -->
    <ul class="nav nav-pills nav-justified bg-light" role="tablist">
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" data-bs-toggle="tab" href="#log-olahraga" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Log Olahraga</span>
            </a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" data-bs-toggle="tab" href="#bidang-olahraga" role="tab">
                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                <span class="d-none d-sm-block">Bidang Olahraga</span>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content p-3 text-muted">
        <div class="tab-pane active" id="log-olahraga" role="tabpanel">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.olahraga.create') }}" class="btn btn-success btn-rounded w-lg mb-5">Tambah Data Olahraga</a>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Olahraga</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Ahmad Juna</td>
                                        <td>Sepak Bola</td>
                                        <td>ahmd.junn@gmail.com</td>
                                        <td>
                                            <a href=""><span class="badge bg-soft-danger">Hapus</span></a>
                                            <a href=""><span class="badge bg-soft-primary">Ubah</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <div class="tab-pane" id="bidang-olahraga" role="tabpanel">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('dashboard.bidang-olahraga.create') }}" class="btn btn-success btn-rounded w-lg mb-5">Tambah Data Olahraga</a>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama Olahraga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Sepak Bola</td>
                                        <td>
                                            <a href=""><span class="badge bg-soft-danger">Hapus</span></a>
                                            <a href=""><span class="badge bg-soft-primary">Ubah</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection