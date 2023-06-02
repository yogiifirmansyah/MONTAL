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
            <a href="{{ url('admin/wali-kelas') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            <form action="{{ url('admin/wali-kelas/'.$walas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
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
                                        <input type="text" class="form-control" name="nama_depan" id="verticalnav-firstname-input" placeholder="Jhon" value="{{ $walas->nama_depan }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nama Belakang</label>
                                        <input type="text" class="form-control" name="nama_belakang" id="verticalnav-lastname-input" placeholder="Doe" value="{{ $walas->nama_belakang }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">NIP</label>
                                        <input type="number" class="form-control" name="nip" id="verticalnav-firstname-input" placeholder="123456789" value="{{ $walas->nip }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Foto</label>
                                        <input type="file" class="form-control" name="foto" id="verticalnav-firstname-input">
                                        <input type="hidden" name="current_image" value="{{ $walas->foto }}">
                                        @if (!empty($walas->foto))
                                        <div class="p-3">
                                            <img src="{{ asset('assets/images/photos/wali-kelas/'. $walas->foto) }}" width="100px" class="img-fluid">
                                        </div>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx" value="{{ $walas->tanggal_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="verticalnav-email-input" placeholder="Surabaya" value="{{ $walas->tempat_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-jenis-kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="verticalnav-jenis-kelamin" class="form-control">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ $walas->jenis_kelamin === 'L' ? 'selected':'' }}>Laki-Laki</option>
                                            <option value="P" {{ $walas->jenis_kelamin === 'P' ? 'selected':'' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">No Hp/Whatsapp</label>
                                        <input type="number" class="form-control" name="telp" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx" value="{{ $walas->telp }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Email</label>
                                        <input type="email" class="form-control" readonly name="email" id="verticalnav-email-input" placeholder="info@montal.com" value="{{ $walas->email }}" />
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat</label>
                                        <textarea id="verticalnav-address-input" name="alamat" class="form-control" rows="2" placeholder="Alamat Domisili">{{ $walas->alamat }}</textarea>
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
                                        <input type="text" class="form-control" name="provinsi" id="verticalnav-Declaration-input" placeholder="Provinsi" value="{{ $walas->provinsi }}">
                                    </div>
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-vatno-input">Kabupaten/Kota</label>
                                        <input type="text" class="form-control" name="kabupaten" id="verticalnav-vatno-input" placeholder="Kabupaten/Kota" value="{{ $walas->kabupaten }}" />
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-cstno-input">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="verticalnav-cstno-input" placeholder="Kecamatan" value="{{ $walas->kecamatan }}">
                                    </div>
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-servicetax-input">Desa</label>
                                        <input type="text" class="form-control" name="desa" id="verticalnav-servicetax-input" placeholder="Desa" value="{{ $walas->desa }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-companyuin-input">Kode Pos</label>
                                        <input type="number" class="form-control" name="kode_pos" id="verticalnav-companyuin-input" placeholder="Kode Pos" value="{{ $walas->kode_pos }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                        </section>

                        <!-- Bank Details -->
                        <h3>Hak Akses</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Hak Akses</label>
                                                <select class="form-select" name="role">
                                                    <option>Pilih Hak Akses</option>
                                                    <option value="0">Siswa/Orang Tua</option>
                                                    <option value="1" selected>Wali Kelas</option>
                                                    <option value="2">Admin</option>
                                                </select>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </section>

                        <!-- Confirm Details -->
                        <h3>Confirm Detail</h3>
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                        </div>
                                        <div>
                                            <h5>Konfirmasi</h5>
                                            <p class="text-muted">Konfirmasi Data Wali Kelas</p>
                                        </div>
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