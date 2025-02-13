@extends('layouts.app')
@push('custom-css')
    <link href="{{ asset('assets/css/register_page.css') }}" rel="stylesheet">
@endpush
@section('title', 'Registro')
@section('content')
    <div class="container">
        <div class="row">
            <nav class="navbar fixed-top">
                <ul class="navbar-nav mr-auto mt-2 ml-4">
                    <li>
                        <a href="{{ route('welcome') }}">
                            <span class="text-gray"><i class="fas fa-chevron-left"> Voltar</i></span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mr-4">
                    <li class="enter"><span class="text-gray text-account">Já tem uma conta?</span><a
                            class="text-enter pl-2" href="{{ route('login') }}"><b>Entrar</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="row justify-content-center form">
            <div class="col-md-6">
                <h3 class="text-center"><b>Criar Nova Conta</b></h3>
                <p class="text-center text-gray">Para fins de regulamentação do setor, seus dados são obrigatórios.</p>
                <form method="POST" action="{{ route('candidate.create') }}">
                    @csrf

                    <label for="name">{{ __('Seu nome*') }}</label>
                    <div class="form-group row">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="username">{{ __('Usuário*') }}</label>
                    <div class="form-group row">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="email">{{ __('E-Mail*') }}</label>
                    <div class="form-group row">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password">{{ __('Criar senha*') }}</label>
                    <div class="form-group row">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" min="8" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check form-group row">
                        <input id="check-terms" type="checkbox" name="checkbox">
                        <label id="label-check" for="check-terms"> Eu concordo com os termos e condições</label>
                    </div>

                    <div class="form-group row mb-0">
                        <input type="submit" class="btn btn-register" value="{{ __('Cadastrar-se') }}">
                    </div>
                </form>
                <div class="mt-5">
                    <a href="{{ route('login.linkedin', 'linkedin') }}" title="" class="btn btn-register linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span class="ml-2">{{ __('Registrar com Linkedin') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
