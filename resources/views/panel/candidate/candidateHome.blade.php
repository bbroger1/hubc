@extends('layouts.employer')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Candidato')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('panel.candidate.sidebar')

        <div id="content">
            @include('navbar')
            @if (Request::is('candidate/home'))
                @include('panel.candidate.content.candidate')
            @elseif (Request::is('candidate/profile/*'))
                @include('panel.candidate.content.profile')
            @endif
        </div>
    </div>
@endsection
