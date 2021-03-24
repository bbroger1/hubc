@extends('layouts.employer')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Empregador')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('panel.employer.sidebar')

        <div id="content">
            @include('navbar')
            @if (Request::is('employer/home'))
                @include('panel.employer.content.employer')
            @elseif (Request::is('employer/profile/*'))
                @include('panel.employer.content.profile')
            @endif

        </div>
    </div>
@endsection
