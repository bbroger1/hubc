<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Empresas Cadastradas') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.employers') }}"><b>{{ __('Empresas') }}</b>
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
                                <th>Empresa</th>
                                <th>Assinante</th>
                                <th>Vagas</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($employers) > 0)
                                @foreach ($employers as $employer)
                                    <tr class="text-center">
                                            <td>{{ \Carbon\Carbon::parse($employer->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ $employer->name }}</td>
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
                                    <td colspan="5" class="alert alert-warning">Ainda não temos empresas cadastradas.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
