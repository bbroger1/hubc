<nav class="navbar navbar-expand-lg navbar-toggleable-sm navbar-light">
    <button type="button" id="sidebarCollapse" class="navbar-btn">
        <i class="fas fa-bars"></i>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="search">
            <input type="search" name="search" id="search">
            <label class="aSearch" for="search" id="a_search">
                <i class="fa fa-search"></i>
            </label>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-comments"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-bell fa-fw"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if (session()->get('username'))
                    <span class="username">{{ session()->get('username') }}</span>
                @else
                    <span class="username">{{ session()->get('name') }}</span>
                @endif
                @if (session()->get('image'))
                    @php
                        $image = session()->get('image');
                    @endphp
                    <img class='rounded-circle' src='{{ url('storage/profile/' . Auth::user()->id . "/{$image}") }}'
                        width='20' height='20'>
                @elseif (isset($user->profileEmployer->image))
                    <img class='rounded-circle'
                        src='{{ url('storage/profile/' . Auth::user()->id . "/{$user->profileEmployer->image}") }}'
                        width='20' height='20'>
                @elseif (isset($user->profileCandidate->image))
                    <img class='rounded-circle'
                        src='{{ url('storage/profile/' . Auth::user()->id . "/{$user->profileCandidate->image}") }}'
                        width='20' height='20'>
                @elseif (isset($user->profileAdm->image))
                    <img class='rounded-circle'
                        src='{{ url('storage/profile/' . Auth::user()->id . "/{$user->profileAdm->image}") }}'
                        width='20' height='20'>
                @else
                    <img class='rounded-circle' src="{{ url('images/profile_basic.png') }}" width='20' height='20'>
                @endif

            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <li class="nav-item">
                    @if (Auth::user()->type === 1)
                        <a href="{{ route('admin.profile', Auth::user()->id) }}" class="dropdown-item">
                            <i class="fa fa-user fa-fw"></i>
                            {{ __('Perfil') }}
                        </a>
                    @elseif(Auth::user()->type === 2)
                        <a href="{{ route('employer.profile', Auth::user()->id) }}" class="dropdown-item">
                            <i class="fa fa-user fa-fw"></i>
                            {{ __('Perfil') }}
                        </a>
                    @elseif(Auth::user()->type === 3)
                        <a href="{{ route('candidate.profile', Auth::user()->id) }}" class="dropdown-item">
                            <i class="fa fa-user fa-fw"></i>
                            {{ __('Perfil') }}
                        </a>
                    @endif
                </li>

                <li class="nav-item">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        {{ __('Configurações') }}
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>{{ __('Sair') }}</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
