@extends('layouts.master')
@section('title', 'Ubah Password')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Ubah Password @endslot
@slot('title') Ubah Data Ubah Password @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            @if (auth()->user()->role == 2)
            <a href="{{ url('admin/dashboard') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
            @elseif (auth()->user()->role == 1)
            <a href="{{ url('dashboard-walikelas') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
            @else
            <a href="{{ url('dashboard') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
            @endif
        </div>
        <div class="card">
            <form action="{{ url('change-password/'.auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-4">Option</h4>

                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Bank Details -->
                        <h3>Ubah Password</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        @if (session('error_message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Gagal!</strong> {{ session('error_message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif

                                        @if (session('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Berhasil!</strong> {{ session('success_message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="verticalnav-servicetax-input">Password Lama</label>
                                                <input type="password" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}" name="old_password" id="verticalnav-servicetax-input" placeholder="Masukkan Password Lama">
                                                @error('old_password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="verticalnav-servicetax-input">Password Baru</label>
                                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="verticalnav-servicetax-input" placeholder="Masukkan Password Baru">
                                                @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="verticalnav-servicetax-input">Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" name="confirm_password" id="verticalnav-servicetax-input" placeholder="Masukkan Konfirmasi Password Baru">
                                                @error('confirm_password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </section>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Save</button>
                </div>
            </form>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection
@section('script')
<!-- jquery-steps js -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
@endsection