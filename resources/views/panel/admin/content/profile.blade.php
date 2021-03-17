<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Detalhes Perfil') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.profile', $profile->id) }}"><b>{{ __('Perfil') }}</b>
                </a>
            </span>
        </div>
    </div>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row profile">
        <div class="accordion col-12" id="accordionExample">
            <!-- Trocar dados pessoais -->
            <div class="card profile">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{ __('Dados Pessoais') }}
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('admin.profile.editPersonal', $profile->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="name">{{ __('Nome completo') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Informe o seu nome completo"
                                            value="{{ $profile->name ?? old('name') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="username">{{ __('Usuário') }}</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Nome de usuário"
                                            value="{{ $profile->username ?? old('username') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cpf">{{ __('CPF') }}</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="000.000.000-00" value="{{ $profile->cpf ?? old('cpf') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthday">{{ __('Data Nasc.') }}</label>
                                        <input type="text" class="form-control" id="birthday" name="birthday"
                                            placeholder="00/00/0000"
                                            value="{{ $profile->birthday ?? old('birthday') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone">{{ __('Celular') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="(00) 00000-0000"
                                            value="{{ $profile->phone ?? old('phone') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email válido" value="{{ $profile->email ?? old('email') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Trocar imagem -->
            <div class="card profile">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Imagem
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="POST" enctype='multipart/form-data'>
                            <div class="form-group">
                                <input type="file" data-icon="true" id="BSbtndanger">
                            </div>
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Trocar senha -->
            <div class="card profile">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Alterar senha
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nova Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
