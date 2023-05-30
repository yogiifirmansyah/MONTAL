@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row align-items-center my-5">
        <div class="col-md-10">
            <h2>Halaman Indikator</h2>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" id="addIndikator" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                Tambah Indikator
            </button>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

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
                        <th>Nama indikator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($indikators as $indikator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $indikator->variabel->nama_variabel }}</td>
                        <td>{{ $indikator->nama_indikator }}</td>
                        <td>
                            <div class="btn btn-sm btn-warning" id="editIndikator" indikator_id="{{ $indikator->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Edit</div>
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
        <form id="indikatorData">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Indikator</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="mb-10">
                        <input type="hidden" name="indikator_id" id="indikatorId">
                        <label for="exampleFormControlInput1" class="form-label">Nama Varibel</label>
                        <select type="text" name="variabel_id" id="variabelId" class="form-select">
                            <option value="">Pilih Indikator</option>
                            @foreach ($variabels as $variabel)
                            <option value="{{ $variabel->id }}" id="option-{{ $variabel->id }}">{{ $variabel->nama_variabel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="form-label">Nama Indikator</label>
                        <input type="text" name="nama_indikator" id="indikatorName" value="" class="form-control" placeholder="Masukkan Nama indikator" />
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="storeIndikator">Tambahkan</button>
                    <button type="submit" class="btn btn-primary" id="updateIndikator">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection