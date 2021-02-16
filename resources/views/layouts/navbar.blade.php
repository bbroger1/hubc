<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="img-logo" src="{{ asset('images/logo_vermelha.png') }}" alt="HUBC - Logo">
        </a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!--<ul class="nav navbar-nav navbar-left navbar-top-links">
        <li>
            <i class="fa fa-bars" aria-hidden="true"></i>
        </li>
    </ul>-->

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown toogle-link">
            <input type="search" name="search" id="search">
            <label class="aSearch" for="search" id="a_search">
                <i class="fa fa-search"></i>
            </label>
        </li>
        <li class="dropdown toogle-link">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o fa-fw"></i>
            </a>
        </li>
        <li class="dropdown toogle-link">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>
            </a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                <span class="username">{{ Auth::user()->name }}</span><b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <span>{{ __('Perfil') }}</span></a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> <span>{{ __('Configurações') }}</span></a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i>
                        <span>{{ __('Sair') }}</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <span class="sidebar-title">{{ __('Principal') }}</span>
                <li>
                    <a href="#">
                        <span class="icon-subtitle"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                        <b class="subtitle">{{ __('Painel de controle') }}</b>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Dados Gerais') }}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Assinaturas') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <br />
                <span class="sidebar-title">{{ __('Utilidades') }}</span>
                <li>
                    <a href="#">
                        <span class="icon-subtitle"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                        <b class="subtitle">{{ __('Ferramentas') }}</b>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Mensagens') }}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Calendário') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <br />
                <span class="sidebar-title pt-3">{{ __('Componentes Extras') }}</span>
                <li>
                    <a href="#">
                        <span class="icon-subtitle"><i class="fa fa-yahoo" aria-hidden="true"></i></span>
                        <b class="subtitle">{{ __('Outros') }}</b>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Dados Gerais') }}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}">
                                <span class="sidebar-img">
                                    <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                        alt="Elipse cinza">
                                    <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                        alt="Elipse vermelha"> {{ __('Assinaturas') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
