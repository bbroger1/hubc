@extends('layouts.admin')
@push('custom-css')
    <link href="{{ asset('assets/css/panel/style.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('title', 'Admin')
@section('content')
    <div class="wrapper">
        <!-- Navigation -->
        @include('panel.admin.sidebar')

        <div id="content">
            @include('navbar')

            @if (Request::is('admin/home'))
                @include('panel.admin.content.admin')
            @elseif (Request::is('admin/employers'))
                @include('panel.admin.content.employers')
            @elseif (Request::is('admin/candidates'))
                @include('panel.admin.content.candidates')
            @elseif (Request::is('admin/vacancies'))
                @include('panel.admin.content.vacancies')
            @elseif (Request::is('admin/vacancies/analysis/*'))
                @include('panel.admin.content.vacanciesAnalysis')
            @elseif (Request::is('admin/profile/*'))
                @include('panel.admin.content.profile')
            @elseif (Request::is('admin/users'))
                @include('panel.admin.content.users')
            @endif

        </div>
    </div>
@endsection
