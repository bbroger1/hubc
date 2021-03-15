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
    <div class="row profile">
        <div class="accordion col-12" id="accordionExample">
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
            <div class="card profile">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Sobre mim
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                        heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card profile">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Endereço
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                        heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card profile">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Habilidades
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                        heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card profile">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Experiência Profissional
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                        heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card profile">
                <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Expectativas
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                        occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                        heard
                        of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
