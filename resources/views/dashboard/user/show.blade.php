@extends('layouts.master')
@section('title', 'User')

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Utility @endslot
@slot('title') Starter Page @endslot
@endcomponent
@endsection