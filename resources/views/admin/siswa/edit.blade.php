@extends('layouts.master')
@section('title', 'Siswa')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Siswa @endslot
@slot('title') Ubah Data Siswa @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <a href="{{ url('admin/siswa') }}">
                <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
            </a>
        </div>
        <div class="card">
            <form action="{{ url('admin/siswa/'.$siswa->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="nama_depan" id="verticalnav-firstname-input" placeholder="Jhon" value="{{ $siswa->nama_depan }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nama Belakang</label>
                                        <input type="text" class="form-control" name="nama_belakang" id="verticalnav-lastname-input" placeholder="Doe" value="{{ $siswa->nama_belakang }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-nisn-input">NISN</label>
                                        <input type="number" class="form-control" name="nisn" id="verticalnav-nisn-input" placeholder="123456789" value="{{ $siswa->nisn }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-kelas">Pilih Kelas</label>
                                        <select name="kelas_id" id="verticalnav-kelas" class="form-select">
                                            <option></option>
                                            @foreach ($kelas as $kls)
                                            <option value="{{ $kls->id }}" {{ $kls->id === $siswa->kelas_id ? 'selected':'' }}>{{ $kls->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-tgl-lahir-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" id="verticalnav-tgl-lahir-input" placeholder="+62xxx xxxx xxxx" value="{{ $siswa->tanggal_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-tmp-lahir-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="verticalnav-tmp-lahir-input" placeholder="Surabaya" value="{{ $siswa->tempat_lahir }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-jenis-kelamin">Pilih Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="verticalnav-jenis-kelamin" class="form-select">
                                            <option></option>
                                            <option value="L" {{ $siswa->jenis_kelamin === 'L' ? 'selected':'' }}>Laki-Laki</option>
                                            <option value="P" {{ $siswa->jenis_kelamin === 'P' ? 'selected':'' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-agama">Pilih Agama</label>
                                        <select name="agama" id="verticalnav-agama" class="form-select">
                                            <option {{ $siswa->agama === 'Islam' ? 'selected':'' }}>Islam</option>
                                            <option {{ $siswa->agama === 'Kristen' ? 'selected':'' }}>Kristen</option>
                                            <option {{ $siswa->agama === 'Katolik' ? 'selected':'' }}>Katolik</option>
                                            <option {{ $siswa->agama === 'Hindu' ? 'selected':'' }}>Hindu</option>
                                            <option {{ $siswa->agama === 'Budha' ? 'selected':'' }}>Budha</option>
                                            <option {{ $siswa->agama === 'Konghucu' ? 'selected':'' }}>Konghucu</option>
                                        </select>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">No Hp/Whatsapp</label>
                                        <input type="number" class="form-control" name="telp" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx" value="{{ $siswa->telp }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-foto-input">Foto</label>
                                        <input type="file" class="form-control" name="foto" id="verticalnav-foto-input">
                                        <input type="hidden" name="current_image" value="{{ $siswa->foto }}">
                                        @if (!empty($siswa->foto))
                                        <div class="p-3">
                                            <img src="{{ asset('assets/images/photos/siswa/'. $siswa->foto) }}" width="100px" class="img-fluid">
                                        </div>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-nama_orang_tua-input">Nama Orang Tua/Wali</label>
                                        <input type="text" class="form-control" name="nama_orang_tua" id="verticalnav-nama_orang_tua-input" placeholder="Contoh: Alex Munster" value="{{ $siswa->nama_orang_tua }}" />
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-pekerjaan_orang_tua-input">Pekerjaan Orang Tua/Wali</label>
                                        <input type="text" class="form-control" name="pekerjaan_orang_tua" id="verticalnav-pekerjaan_orang_tua-input" placeholder="Contoh: Karyawan Swasta" value="{{ $siswa->pekerjaan_orang_tua }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <?php
                                $anak_ke =  explode(',', $siswa->anak_ke);
                                ?>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <span for="verticalnav-anak_ke">Anak&nbsp;ke</span>
                                    <input type="text" class="form-control mx-2" name="anak_ke[]" id="verticalnav-anak_ke" placeholder="Contoh: 2" value="{{ $anak_ke[0] }}">
                                    <span for="verticalnav-anak_ke">Dari</span>
                                    <input type="text" class="form-control mx-2" name="anak_ke[]" id="verticalnav-anak_ke" placeholder="Contoh: 3" value="{{ $anak_ke[1] }}">
                                    <span>Bersaudara</span>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat</label>
                                        <textarea id="verticalnav-address-input" name="alamat" class="form-control" rows="2" placeholder="Alamat Domisili">{{ $siswa->alamat }}</textarea>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </section>

                        <!-- Bank Details -->
                        <h3>Status</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="verticalnav-tgl-masuk-input">Tanggal Masuk</label>
                                                <input type="date" class="form-control" name="tanggal_masuk" id="verticalnav-tgl-masuk-input" value="{{ $siswa->tanggal_masuk }}">
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select class="form-select" name="status">
                                                    <option>Pilih Status</option>
                                                    <option value="0" {{ $siswa->status === 0 ? 'selected':'' }}>Tidak Aktif</option>
                                                    <option value="1" {{ $siswa->status === 1 ? 'selected':'' }}>Aktif</option>
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
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx" value="{{ $siswa->tanggal_masuk }}">
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                        </div>
                                        <div>
                                            <h5>Konfirmasi</h5>
                                            <p class="text-muted">Konfirmasi Data Siswa</p>
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