@extends('layouts.master')
@section('title', 'Olahraga')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Olahraga @endslot
        @slot('title') Tambah Data Bidang Olahraga @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-3 mb-3">
                <a href="{{ route('dashboard.olahraga.index') }}">
                    <button class="btn btn-outline-secondary waves-effect waves-light w-md">Kembali</button>
                </a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bidang Olahraga</h4>

                    <form action="">
                        <div class="mb-3 row">
                            <label for="example-datetime-local-input" class="col-md-2 col-form-label">Bidang Olahraga</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="example-datetime-local-input">
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