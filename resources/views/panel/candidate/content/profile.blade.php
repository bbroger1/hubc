<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Detalhes Perfil') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('candidate.profile', $user->id) }}"><b>{{ __('Perfil') }}</b>
                </a>
            </span>
        </div>
    </div>
    @include('layouts.partials.alerts')
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
                        <form action="{{ route('candidate.profile.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="name">{{ __('Nome completo') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Informe o seu nome completo"
                                            value="{{ $user->name ?? old('name') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="username">{{ __('Usuário') }}</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Nome de usuário"
                                            value="{{ $user->username ?? old('username') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cpf">{{ __('CPF') }}</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="000.000.000-00"
                                            value="{{ $user->profileCandidate->cpf ?? old('cpf') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthday">{{ __('Data Nasc.') }}</label>
                                        <input type="text" class="form-control" id="birthday" name="birthday"
                                            placeholder="00/00/0000"
                                            value="{{ $user->profileCandidate->birthday ?? old('birthday') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone">{{ __('Celular') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="(00) 00000-0000"
                                            value="{{ $user->profileCandidate->phone ?? old('phone') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email válido" value="{{ $user->email ?? old('email') }}">
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

            <!-- Trocar endereço -->
            <div class="card profile">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('Endereço') }}
                        </button>
                    </h2>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('candidate.profile.updateAddress', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="zip_code">{{ __('CEP') }}</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                            placeholder="CEP"
                                            value="{{ $user->address->zip_code ?? old('zip_code') }}" required>
                                        <span class="erroCep" id="erroCep" role="alert">
                                        </span>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="address">{{ __('Endereço') }}</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Informe a Av., Rua, Vila, etc"
                                            value="{{ $user->address->address ?? old('address') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="number">{{ __('Número') }}</label>
                                        <input type="text" class="form-control" id="number" name="number"
                                            placeholder="Nr." value="{{ $user->address->number ?? old('number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="complement">{{ __('Complemento') }}</label>
                                        <input type="text" class="form-control" id="complement" name="complement"
                                            placeholder="Apto, Loja, Casa"
                                            value="{{ $user->address->complement ?? old('complement') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="neighborhood">{{ __('Bairro') }}</label>
                                        <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                            placeholder="Bairro"
                                            value="{{ $user->address->neighborhood ?? old('neighborhood') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city">{{ __('Cidade') }}</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            placeholder="Cidade" value="{{ $user->address->city ?? old('city') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="state">{{ __('Estado') }}</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="UF"
                                            value="{{ $user->address->state ?? old('state') }}">
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

            <!-- Trocar sobre o candidato -->
            <div class="card profile">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('Sobre você') }}
                        </button>
                    </h2>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('candidate.profile.updateAbout', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Escreva um pouco sobre você:</label>
                                <textarea name="description" rows="5" cols="40"
                                    class="form-control tinymce-editor">{{ $user->profileEmployer->description ?? old('description') }}</textarea>
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
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Imagem
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row text-center mb-3">
                            <div class="col-md-6">
                                <div><label for="">Imagem atual:</label></div>
                                @if (isset($user->profileCandidate->image))
                                    <img src="{{ url("storage/profile/{$user->id}/{$user->profileCandidate->image}") }}"
                                        alt="{{ $user->profileCandidate->image }}" width='100' height='100'>
                                @else
                                    <img src="{{ url('images/profile_basic.png') }}" alt="" width='100' height='100'>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div><label for="">Nova imagem:</label></div>
                                <img id="newimage" src="{{ url('images/profile_basic.png') }}" alt="" width='100'
                                    height='100'>
                            </div>
                        </div>
                        <form action="{{ route('candidate.profile.updateImage', $user->id) }}" method="POST"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <input type="file" name="image" data-icon="true" id="BSbtndanger">
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
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Alterar senha
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" action="{{ route('candidate.profile.updatePassword', $user->id) }}">
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
