@extends('layouts.master')
@section('title', 'Bimbingan Fisik')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Utility @endslot
        @slot('title') Starter Page @endslot
    @endcomponent
@endsection
