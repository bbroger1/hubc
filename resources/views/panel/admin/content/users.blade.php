<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Usuários Cadastrados') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.users') }}"><b>{{ __('Usuários') }}</b>
                </a>
            </span>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-9 text-right">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" name="search_panel" class="input-employer">
                        <button type="submit" class="btn-pesquisar">Pesquisar</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn-pesquisar"><i class="fa fa-user fa-fw"></i> Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row graphic">
        <div class="card m-b-20">
            <div class="inbox-wid">
                <div class="inbox-item">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->type == 1)
                                                Administrador
                                            @elseif($user->type == 2)
                                                Empresa
                                            @elseif($user->type == 3)
                                                Candidato
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-profile">ver perfil</a>
                                            @if ($user->type == 2)
                                                <a href="" class="btn btn-profile">ver vagas</a>
                                            @elseif($user->type == 3)
                                                <a href="" class="btn btn-profile">candidaturas</a>
                                            @endif
                                            <a href="" class="btn btn-vacancies">excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="5" class="alert alert-warning">Ainda não temos usuários cadastradas.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
