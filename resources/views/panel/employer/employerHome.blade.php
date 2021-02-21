@extends('layouts.admin')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Admin')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('panel.employer.sidebar')

        <div id="content">
            @include('panel.navbar')
            @include('panel.employer.content.employer')
        </div>
    </div>
@endsection
