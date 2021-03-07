<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Usuários Cadastrados') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.users') }}"><b>{{ __('Usuários') }}</b>
                </a>
            </span>
        </div>
        <div class="col-sm-6 text-right">
            <form action="" method="POST">
                @csrf
                <input type="text" name="search_panel" class="input-employer">
                <button type="submit" class="btn-pesquisar">Pesquisar</button>
            </form>
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
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    @if ($user)
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
                                                <a href="" class="btn btn-profile">ver candidaturas</a>
                                            @endif
                                            <a href="" class="btn btn-vacancies">excluir</a>
                                        </td>
                                    @else
                                        <span>Ainda não temos usuários cadastrados.</span>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
