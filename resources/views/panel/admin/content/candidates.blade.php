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
                <input type="text" name="search_panel" class="input-employer">
                <button type="submit" name="btn-pesquisar" class="btn-pesquisar">Pesquisar</button>
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
                            @if (count($candidates) > 0)
                                @foreach ($candidates as $candidate)
                                    <tr class="text-center">
                                        <td>{{ \Carbon\Carbon::parse($candidate->created_at)->format('d/m/Y') }}</td>
                                        <td>{{ $candidate->name }}</td>
                                        <td>Não</td>
                                        <td>0</td>
                                        <td>
                                            <a href="" class="btn btn-profile">ver perfil</a>
                                            <a href="" class="btn btn-vacancies">ver vagas</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="5" class="alert alert-warning">Ainda não temos candidatos cadastradas.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
