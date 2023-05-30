@extends('layouts.master')
@section('title', 'Bimbingan Fisik')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Bimbingan Fisik @endslot
        @slot('title') Dashboard Bimbingan Fisik @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">

                
                <div class="card-body">
                    <a href="{{ route('dashboard.user.create') }}" class="btn btn-success btn-rounded w-lg mb-5">Tambah Bimbingan Fisik</a>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td>Ahmad Juna</td>
                                <td>Jalan asia pasifik</td>
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
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection