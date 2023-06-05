@extends('layouts.master')
@section('title', 'Wali Kelas')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Wali Kelas @endslot
@slot('title') Ubah Data Wali Kelas @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <a href="{{ url('dashboard-walikelas') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            <form action="{{ url('profile/'.auth()->user()->wali_kelas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif

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
                    <h4 class="card-title mb-4">Option</h4>

                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Seller Details -->
                        <h3>Data Diri Lengkap</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nama Depan</label>
                                        <input type="text" class="form-control" readonly name="nama_depan" id="verticalnav-firstname-input" placeholder="Jhon" value="{{ auth()->user()->wali_kelas->nama_depan }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nama Belakang</label>
                                        <input type="text" class="form-control" readonly name="nama_belakang" id="verticalnav-lastname-input" placeholder="Doe" value="{{ auth()->user()->wali_kelas->nama_belakang }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-nip-input">NIP</label>
                                        <input type="number" class="form-control" readonly name="nip" id="verticalnav-nip-input" placeholder="123456789" value="{{ auth()->user()->wali_kelas->nip }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-foto-input">Foto</label>
                                        <input type="file" class="form-control" name="foto" id="verticalnav-foto-input">
                                        <input type="hidden" name="current_image" value="{{ auth()->user()->wali_kelas->foto }}">
                                        @if (!empty(auth()->user()->wali_kelas->foto))
                                        <div class="p-3">
                                            <img src="{{ asset('assets/images/photos/wali-kelas/'. auth()->user()->wali_kelas->foto) }}" width="100px" class="img-fluid">
                                        </div>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-tgl-lahir-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" readonly name="tanggal_lahir" id="verticalnav-tgl-lahir-input" placeholder="+62xxx xxxx xxxx" value="{{ auth()->user()->wali_kelas->tanggal_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-tmp-lahir-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" readonly name="tempat_lahir" id="verticalnav-tmp-lahir-input" placeholder="Surabaya" value="{{ auth()->user()->wali_kelas->tempat_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-jenis-kelamin">Jenis Kelamin</label>
                                        <input name="jenis_kelamin" readonly id="verticalnav-jenis-kelamin" class="form-control" value="{{ auth()->user()->wali_kelas->jenis_kelamin === 'L' ? 'Laki-Laki':'Perempuan' }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">No Hp/Whatsapp</label>
                                        <input type="number" class="form-control" name="telp" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx" value="{{ auth()->user()->wali_kelas->telp }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Email</label>
                                        <input type="email" class="form-control" readonly name="email" id="verticalnav-email-input" placeholder="info@montal.com" value="{{ auth()->user()->wali_kelas->email }}" />
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat</label>
                                        <textarea id="verticalnav-address-input" name="alamat" class="form-control" rows="2" placeholder="Alamat Domisili">{{ auth()->user()->wali_kelas->alamat }}</textarea>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </section>

                        <!-- Company Document -->
                        <h3>Detail Alamat</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-declaration-input">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" id="verticalnav-Declaration-input" placeholder="Provinsi" value="{{ auth()->user()->wali_kelas->provinsi }}">
                                    </div>
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-vatno-input">Kabupaten/Kota</label>
                                        <input type="text" class="form-control" name="kabupaten" id="verticalnav-vatno-input" placeholder="Kabupaten/Kota" value="{{ auth()->user()->wali_kelas->kabupaten }}" />
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-cstno-input">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="verticalnav-cstno-input" placeholder="Kecamatan" value="{{ auth()->user()->wali_kelas->kecamatan }}">
                                    </div>
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-servicetax-input">Desa</label>
                                        <input type="text" class="form-control" name="desa" id="verticalnav-servicetax-input" placeholder="Desa" value="{{ auth()->user()->wali_kelas->desa }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-companyuin-input">Kode Pos</label>
                                        <input type="number" class="form-control" name="kode_pos" id="verticalnav-companyuin-input" placeholder="Kode Pos" value="{{ auth()->user()->wali_kelas->kode_pos }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
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