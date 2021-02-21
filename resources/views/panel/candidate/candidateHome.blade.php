@extends('layouts.admin')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Admin')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('panel.candidate.sidebar')

        <div id="content">
            @include('panel.navbar')
            @include('panel.candidate.content.candidate')
        </div>
    </div>
@endsection
