@extends('layouts.admin')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Admin')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('layouts.sidebar')

        <div id="content">
            @include('layouts.navbar')
            @include('panel.content.admin')
        </div>
    </div>
@endsection
