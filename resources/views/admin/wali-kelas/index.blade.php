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
                                <a href=""><span class="badge bg-soft-danger">Hapus</span></a>
                                <a href=""><span class="badge bg-soft-primary">Ubah</span></a>
                                <a href=""><span class="badge bg-soft-warning">Lihat Detail</span></a>
                            </td>
                        </tr>
                        @endforeach
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
<!-- Custom JS -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script>
@endsection