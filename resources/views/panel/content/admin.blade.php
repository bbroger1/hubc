<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h3><b>{{ __('Dados Gerais') }}</b></h3>
            <span class="breadcumb">HUB C / <a href="{{ route('home') }}"><b>{{ __('Painel') }}</b></a></span>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="panel">
                <div class="panel-heading mt-3 ml-3">
                    <b>Assinantes</b><br>
                    <b>24k</b><br>
                    <span class="panel-text"><span class="panel-growth"><i class="fas fa-chart-line mr-2">
                            </i> 8,5%</span> de crescimento</span>
                </div>
                <a href="#">
                    <div class="panel-footer text-center mt-4 mb-2">
                        <span class="panel-icon"><i class="fas fa-user-friends fa-2x circle-icon"></i></span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="panel">
                <div class="panel-heading mt-3 ml-3">
                    <b>Empresas</b><br>
                    <b>24k</b><br>
                    <span class="panel-text"><span class="panel-growth"><i class="fas fa-chart-line mr-2">
                            </i> 8,5%</span> de crescimento</span>
                </div>
                <a href="#">
                    <div class="panel-footer text-center mt-4 mb-2">
                        <span class="panel-icon"><i class="fas fa-suitcase fa-2x circle-icon"></i></span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="panel">
                <div class="panel-heading mt-3 ml-3">
                    <b>Candidatos</b><br>
                    <b>24k</b><br>
                    <span class="panel-text"><span class="panel-growth"><i class="fas fa-chart-line mr-2">
                            </i> 8,5%</span> de crescimento</span>
                </div>
                <a href="#">
                    <div class="panel-footer text-center mt-4 mb-2">
                        <span class="panel-icon"><i class="fas fa-user fa-2x circle-icon"></i></span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="panel">
                <div class="panel-heading mt-3 ml-3">
                    <b>Gestão de Assinaturas</b><br>
                    <b>24k</b><br>
                    <span class="panel-text"><span class="panel-growth"><i class="fas fa-chart-line mr-2">
                            </i> 8,5%</span> de crescimento</span>
                </div>
                <a href="#">
                    <div class="panel-footer text-center mt-4 mb-2">
                        <span class="panel-icon"><i class="fas fa-user-check fa-2x circle-icon"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row graphic">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="row">
                    <div class="card-title text-left col-sm-6">
                        <span class="mt-0 header-title mb-3">Visão geral de assinaturas</span>
                    </div>
                    <div class="card-select text-right col-sm-6">
                        <select name="graphic-period" id="select-graphic">
                            <option value="mes">Mês Anterior</option>
                            <option value="ano">Ano</option>
                        </select>
                    </div>
                </div>
                <hr>
            </div>
            <div class="inbox-wid">
                <div class="inbox-item">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
