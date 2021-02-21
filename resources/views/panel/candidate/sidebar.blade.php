<nav id="sidebar">
    <div class="sidebar-header text-center">
        <img class="img-logo" src="{{ asset('images/logo_vermelha.png') }}" alt="HUBC - Logo">
    </div>

    <ul class="list-unstyled components">
        <span class="sidebar-title">{{ __('Principal') }}</span>
        <li class="active">
            <a href="#painelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon-subtitle"><i class="fas fa-home"></i></span>
                <b class="subtitle">{{ __('Painel de controle') }}</b>
            </a>
            <ul class="collapse list-unstyled" id="painelSubmenu">
                <li>
                    <a href="{{ route('candidate.home') }}">
                        <span class="sidebar-img">
                            <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}" alt="Elipse cinza">
                            <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                alt="Elipse vermelha"> {{ __('Dados Gerais') }}
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('candidate.home') }}">
                        <span class="sidebar-img">
                            <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}" alt="Elipse cinza">
                            <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                alt="Elipse vermelha"> {{ __('Assinaturas') }}
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <br />
        <hr>
        <span class="sidebar-title">{{ __('Utilidades') }}</span>
        <li>
            <a href="#ferramentasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon-subtitle"><i class="fas fa-wrench"></i></span>
                <b class="subtitle">{{ __('Ferramentas') }}</b>
            </a>
            <ul class="collapse list-unstyled" id="ferramentasSubmenu">
                <li>
                    <a href="{{ route('candidate.home') }}">
                        <span class="sidebar-img">
                            <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                alt="Elipse cinza">
                            <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                alt="Elipse vermelha"> {{ __('Mensagens') }}
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('candidate.home') }}">
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
        <hr>
        <span class="sidebar-title pt-3">{{ __('Componentes Extras') }}</span>
        <li>
            <a href="#outrosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon-subtitle"><i class="fab fa-yandex-international" aria-hidden="true"></i></span>
                <b class="subtitle">{{ __('Outros') }}</b>
            </a>
            <ul class="collapse list-unstyled" id="outrosSubmenu">
                <li>
                    <a href="{{ route('candidate.home') }}">
                        <span class="sidebar-img">
                            <img class="img-default" src="{{ asset('images/ellipse_cinza.png') }}"
                                alt="Elipse cinza">
                            <img class="img-hover" src="{{ asset('images/ellipse_vermelha.png') }}"
                                alt="Elipse vermelha"> {{ __('Dados Gerais') }}
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('candidate.home') }}">
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

    <ul class="list-unstyled CTAs">
        <li>
            <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>{{ __('Sair') }}</span>
            </a>
        </li>
    </ul>
</nav>
