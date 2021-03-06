<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h3><b>{{ __('Vagas Cadastradas') }}</b></h3>
            <span class="breadcumb">HUB C /
                <a href="{{ route('admin.vacancies') }}"><b>{{ __('Vagas') }}</b>
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
                                <th>Cargo</th>
                                <th>Empresa</th>
                                <th>Email</th>
                                <th>Situação</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employers as $employer)
                                <tr class="text-center">
                                    @if ($employer)
                                        <td>{{ \Carbon\Carbon::parse($employer->created_at)->format('d/m/Y') }}</td>
                                        <td>{{ $employer->name }}</td>
                                        <td>Empregador</td>
                                        <td>empregador@teste.com</td>
                                        <td>Pendente</td>
                                        <td>
                                            <a href="{{ route('admin.vacancies.analysis', $employer->id) }}"
                                                class="btn btn-profile">Analisar vaga</a>
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
