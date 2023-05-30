@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row align-items-center my-5">
        <div class="col-md-10">
            <h2>Halaman Variabel</h2>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                Tambah Variabel
            </button>
        </div>
    </div>

    <div class="p-10 bg-white">
        @if (session('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 gy-7">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800">
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
                            <div class="btn btn-sm btn-danger">Hapus</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <form action="{{ url('admin/variabel') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Variabel</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="form-label">Nama Varibel</label>
                        <input type="text" name="nama_variabel" class="form-control form-control-solid" placeholder="Masukkan Nama Variabel" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection