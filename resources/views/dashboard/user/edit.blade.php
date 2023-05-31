@extends('layouts.master')
@section('title', 'User')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') User @endslot
        @slot('title') Ubah Data User @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Option</h4>

                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Seller Details -->
                        <h3>Detail User</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-firstname-input">Nama Depan</label>
                                            <input type="text" class="form-control" id="verticalnav-firstname-input" placeholder="Jhon">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-lastname-input">Nama Belakang</label>
                                            <input type="text" class="form-control" id="verticalnav-lastname-input" placeholder="Doe">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-phoneno-input">No Hp/Whatsapp</label>
                                            <input type="text" class="form-control" id="verticalnav-phoneno-input" placeholder="+62xxx xxxx xxxx">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-email-input">Email</label>
                                            <input type="email" class="form-control" id="verticalnav-email-input" placeholder="info@montal.com">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="verticalnav-address-input">Alamat</label>
                                            <textarea id="verticalnav-address-input" class="form-control" rows="2" placeholder="Alamat Domisili"></textarea>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </section>

                        <!-- Company Document -->
                        <h3>Detail Alamat</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-declaration-input">Provinsi</label>
                                            <input type="text" class="form-control" id="verticalnav-Declaration-input" placeholder="Provinsi">
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-pancard-input">Kota</label>
                                            <input type="text" class="form-control" id="verticalnav-pancard-input" placeholder="Kota">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-vatno-input">Kabupaten</label>
                                            <input type="text" class="form-control" id="verticalnav-vatno-input" placeholder="Kabupaten" />
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-cstno-input">Kecamatan</label>
                                            <input type="text" class="form-control" id="verticalnav-cstno-input" placeholder="Kecamatan">
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-servicetax-input">Desa</label>
                                            <input type="text" class="form-control" id="verticalnav-servicetax-input" placeholder="Desa">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-companyuin-input">Kode Pos</label>
                                            <input type="number" class="form-control" id="verticalnav-companyuin-input" placeholder="Kode Pos">
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </form>
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
                                                <select class="form-select">
                                                    <option selected>Pilih Hak Akses</option>
                                                    <option value="AE">American Express</option>
                                                    <option value="VI">Visa</option>
                                                    <option value="MC">MasterCard</option>
                                                    <option value="DI">Discover</option>
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
                                            <p class="text-muted">Konfirmasi Data User</p>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                        </section>
                    </div>
                </div>
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