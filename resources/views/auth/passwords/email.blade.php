@extends('layouts.app')
@section('title', 'Recuperar senha')
@section('content')
    <div class="container">
        <div class="row">
            <nav class="navbar fixed-top">
                <ul class="navbar-nav mr-auto mt-2 ml-4">
                    <li>
                        <a href="{{ route('login') }}">
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
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Recuperar a senha') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail cadastrado') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-reset_password">
                                        {{ __('Enviar link de recuperação da senha') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
