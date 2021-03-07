@extends('layouts.app')
@push('custom-css')
    <link href="{{ asset('assets/css/register_page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_page.css') }}" rel="stylesheet">
@endpush
@section('title', 'Entrar')
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
                    <li class="enter"><span class="text-gray text-account">Ainda não possui conta?</span><a
                            class="text-enter pl-2" href="{{ route('welcome') }}"><b>Cadastrar-se</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="row justify-content-center form">
            <div class="col-md-6">
                <h3 class="text-center"><b class="text-red">Conecte-se para continuar</b></h3>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mt-5 mb-2">
                    <a href="#" title="" class="btn btn-register linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span class="ml-2">{{ __('Continuar com Linkedin') }}</span>
                    </a>
                </div>
                <div class="or mb-2">
                    <hr> ou
                    <hr>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

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

                    <label for="password">{{ __('Senha*') }}</label>
                    <div class="form-group row">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <input id="check-terms" type="checkbox" name="remember_token">
                            <label id="label-check" for="check-terms"> {{ __('Lembrar-me') }}</label>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('password.request') }}">{{ __('Esqueci a senha') }}</a>
                        </div>

                    </div>

                    <div class="form-group row mb-0 mt-4">
                        <input type="submit" class="btn btn-register" value="{{ __('Entrar agora') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
