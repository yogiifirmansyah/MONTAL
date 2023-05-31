@extends('layouts.master')
@section('title', 'Keagamaan')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Keagamaan @endslot
        @slot('title') Tambah Data Penilaian Keagamaan @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-3 mb-3">
                <a href="{{ route('dashboard.keagamaan.index') }}">
                    <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
                </a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Penilaian Keagamaan</h4>

                    <form action="">
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Siswa</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option selected>Pilih Siswa</option>
                                    <option>Agus</option>
                                    <option>Hari</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Bidang Olahraga</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option selected>Pilih Olahraga</option>
                                    <option>Sepak Bola</option>
                                    <option>Bola Volly</option>
                                    <option>Bulu Tangkis</option>
                                    <option>Renang</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-datetime-local-input" class="col-md-2 col-form-label">Tanggal Pelaksanaan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" id="example-datetime-local-input">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-md-2 col-form-label">Durasi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" id="example-number-input">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-md-2 col-form-label">Penilaian</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option selected>Pilih Penilaian</option>
                                    <option>A</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B</option>
                                    <option>B-</option>
                                    <option>C+</option>
                                    <option>C</option>
                                    <option>C-</option>
                                    <option>D</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-3 mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                            <button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
<!-- end row -->
@endsection
@section('script')
<!-- jquery-steps js -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
@endsection