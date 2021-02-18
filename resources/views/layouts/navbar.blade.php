<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i>
                                <span>{{ __('Sair') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
