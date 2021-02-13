@extends('layouts.app')

@section('title', 'Bem vindo')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar fixed-top">
                <ul class="navbar-nav mr-auto mt-2 ml-4">
                    <li class="logo"><img class="img-logo" src="{{ asset('images/logo_branca.png') }}" alt="HUBC - Logo">
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mr-4">
                    <li class="enter"><span class="text-gray text-account">Já tem uma conta?</span><a
                            class="text-enter pl-2" href="{{ route('login') }}"><b>Entrar</b></a></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col col-md-6 col-lg-6 slider_container">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target='#slider' data-slide-to="0" class="active indicator">
                        <li data-target='#slider' data-slide-to="1" class="indicator">
                        <li data-target='#slider' data-slide-to="2" class="indicator">
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="img-carousel">
                                <img src="{{ asset('images/pexels-fauxels-3184287.jpg') }}" alt="img1">
                            </div>
                            <div class="carousel-caption d-none d-md-block carousel-text">
                                <div class="rectangle-left">
                                    <div class="rectangle rectangle-one"></div>
                                </div>
                                <div class="mt-5">
                                    <p>AS MELHORES OPORTUNIDADES NA MELHOR PLATAFORMA</p>
                                </div>
                                <div class="rectangle-right">
                                    <div class="rectangle rectangle-two"></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="img-carousel">
                                <img src="{{ asset('images/pexels-fauxels-3184287.jpg') }}" alt="img2">
                            </div>
                            <div class="carousel-caption d-none d-md-block carousel-text">
                                <div class="rectangle-left">
                                    <div class="rectangle rectangle-one"></div>
                                </div>
                                <div class="mt-5">
                                    <p>AS MELHORES OPORTUNIDADES NA MELHOR PLATAFORMA</p>
                                </div>
                                <div class="rectangle-right">
                                    <div class="rectangle rectangle-two"></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="img-carousel">
                                <img src="{{ asset('images/pexels-fauxels-3184287.jpg') }}" alt="img3">
                            </div>
                            <div class="carousel-caption d-none d-md-block carousel-text">
                                <div class="rectangle-left">
                                    <div class="rectangle rectangle-one"></div>
                                </div>
                                <div class="mt-5">
                                    <p>AS MELHORES OPORTUNIDADES NA MELHOR PLATAFORMA</p>
                                </div>
                                <div class="rectangle-right">
                                    <div class="rectangle rectangle-two"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-md-6 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading">Junte-se a nós</h3>
                                <p class="text-gray">Para começar esta jornada, diga-nos qual seu tipo de perfil:</p>
                                <a href="{{ route('candidate.register') }}" class="btn btn-lg btn-block candidate mb-2"
                                    id="candidate-arrow">
                                    <div class="row">
                                        <div class="col-2 icon-align">
                                            <i class="far fa-user icon-user"></i>
                                        </div>
                                        <div class="col-8 left">
                                            <span class="vacancy-text1">
                                                Quero uma vaga
                                            </span>
                                            <br />
                                            <span class="vacancy-text2 text-gray">
                                                Estou em busca de novas oportunidades.
                                            </span>
                                        </div>
                                        <div class="col-2 icon-align">
                                            <i class="fas fa-arrow-right candidate-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('employer.register') }}" class="btn btn-lg btn-block employer mb-2"
                                    id="employer-arrow">
                                    <div class="row">
                                        <div class="col-2 icon-align">
                                            <i class="fas fa-suitcase icon-user"></i>
                                        </div>
                                        <div class="col-8">
                                            <span class="vacancy-text1">
                                                Tenho uma vaga
                                            </span>
                                            <br />
                                            <span class="vacancy-text2 text-gray">
                                                Gostaria de oferecer novas
                                                oportunidades.
                                            </span>
                                        </div>
                                        <div class="col-2 icon-align">
                                            <i class="fas fa-arrow-right employer-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
