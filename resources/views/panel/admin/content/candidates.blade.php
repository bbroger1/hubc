<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Candidatos Cadastradas') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.candidates') }}"><b>{{ __('Candidatos') }}</b>
                </a>
            </span>
        </div>
        <div class="col-sm-6 text-right">
            <form action="" method="POST">
                @csrf
                <input type="text" name="search" class="input-employer">
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
                                <th>Data</th>
                                <th>Candidato</th>
                                <th>Assinante</th>
                                <th>Candidaturas</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $candidate)
                                <tr class="text-center">
                                    @if ($candidate)
                                        <td>{{ \Carbon\Carbon::parse($candidate->created_at)->format('d/m/Y') }}</td>
                                        <td>{{ $candidate->name }}</td>
                                        <td>Não</td>
                                        <td>0</td>
                                        <td>
                                            <a href="" class="btn btn-profile">ver perfil</a>
                                            <a href="" class="btn btn-vacancies">ver vagas</a>
                                        </td>
                                    @else
                                        <span>Ainda não temos empresas cadastradas.</span>
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
