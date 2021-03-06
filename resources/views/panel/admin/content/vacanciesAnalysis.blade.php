@foreach ($employers as $employer)

    <div class="container-fluid mt-4">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h3><b>{{ __('Detalhes da Vaga') }}</b></h3>
                <span class="breadcumb">HUB C /
                    <a href="{{ route('admin.vacancies.analysis', $employer->id) }}"><b>{{ __('Vagas cadastradas') }}</b>
                    </a>
                </span>
            </div>
        </div>

        <div class="row vacancies-container no-gutters">
            <div class="col-12 col-md-4">
                <label><b>Título da Vaga:</b></label>
            </div>
            <div class="vacancie-title col-12 col-md-8">
                <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
            </div>

            <div class="col-md-12">
                <label><b>Perfil Desejado:</b></label>
            </div>
            <div class="vacancie-profile pl-2 pr-2">
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus, orci vitae sagittis rutrum,
                    dolor diam gravida felis, et pulvinar odio ipsum eget felis. Donec at augue eget metus ultrices
                    molestie. Praesent nisl sem, aliquam in auctor a, rhoncus ut nisi. Proin justo quam, fringilla quis
                    nulla ut, fermentum viverra nisl. Aenean facilisis consequat convallis. Nullam et tempus enim.
                    Vestibulum ullamcorper a lectus feugiat porta. Praesent luctus porttitor leo ac mattis. Fusce massa
                    felis, sodales sit amet egestas id, suscipit in mi. Proin pulvinar commodo magna ac fringilla. Morbi
                    eget arcu convallis felis vestibulum lacinia id vitae quam. Mauris quis commodo mauris.
                </span>
            </div>

            <div class="col-md-12 mt-2">
                <label><b>Nível de Experiência:</b></label>
                <div class="form-check form-check-inline ml-5 radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="Junior" checked>
                    <label class="form-check-label" for="inlineCheckbox1">Junior</label>
                </div>
                <div class="form-check form-check-inline radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="Pleno" disabled>
                    <label class="form-check-label" for="inlineCheckbox2">Pleno</label>
                </div>
                <div class="form-check form-check-inline radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox3" value="Senior" disabled>
                    <label class="form-check-label" for="inlineCheckbox3">Senior</label>
                </div>
            </div>

            <div class="col-md-12">
                <label><b>Tipo de Contratação:</b></label>
                <div class="form-check form-check-inline ml-5 radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="CLT" checked>
                    <label class="form-check-label" for="inlineCheckbox1">CLT</label>
                </div>
                <div class="form-check form-check-inline radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="PJ" disabled>
                    <label class="form-check-label" for="inlineCheckbox2">PJ</label>
                </div>
                <div class="form-check form-check-inline radio-item">
                    <input class="form-check-input" type="radio" id="inlineCheckbox3" value="Autonomo" disabled>
                    <label class="form-check-label" for="inlineCheckbox3">Autonomo</label>
                </div>
            </div>

            <div class="col-md-6">
                <label class="vacancie-label-work"><b>Local de Trabalho:</b></label>
                <span> Lorem ipsum dolor sit amet.</span>
            </div>
            <div class="col-md-6">
                <label><b>Prazo:</b></label><b></b>
                <span> 30 dias</span>
                <span class="ml-2"><i class="far fa-calendar-alt"></i></span>
            </div>
            <div class="col-md-12">
                <label><b>Requisitos da vaga:</b></label>
            </div>
            <div class="vacancie-profile pl-2 pr-2">
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus, orci vitae sagittis rutrum,
                    dolor diam gravida felis, et pulvinar odio ipsum eget felis. Donec at augue eget metus ultrices
                    molestie. Praesent nisl sem, aliquam in auctor a, rhoncus ut nisi. Proin justo quam, fringilla quis
                    nulla ut, fermentum viverra nisl. Aenean facilisis consequat convallis. Nullam et tempus enim.
                    Vestibulum ullamcorper a lectus feugiat porta. Praesent luctus porttitor leo ac mattis. Fusce massa
                    felis, sodales sit amet egestas id, suscipit in mi. Proin pulvinar commodo magna ac fringilla. Morbi
                    eget arcu convallis felis vestibulum lacinia id vitae quam. Mauris quis commodo mauris.
                </span>
            </div>
            <div class="col-md-12 mt-2">
                <label><b>Descrição da empresa:</b></label>
            </div>
            <div class="vacancie-profile pl-2 pr-2">
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus, orci vitae sagittis rutrum,
                    dolor diam gravida felis, et pulvinar odio ipsum eget felis. Donec at augue eget metus ultrices
                    molestie. Praesent nisl sem, aliquam in auctor a, rhoncus ut nisi. Proin justo quam, fringilla quis
                    nulla ut, fermentum viverra nisl. Aenean facilisis consequat convallis. Nullam et tempus enim.
                    Vestibulum ullamcorper a lectus feugiat porta. Praesent luctus porttitor leo ac mattis. Fusce massa
                    felis, sodales sit amet egestas id, suscipit in mi. Proin pulvinar commodo magna ac fringilla. Morbi
                    eget arcu convallis felis vestibulum lacinia id vitae quam. Mauris quis commodo mauris.
                </span>
            </div>
            <div class="col-md-12 mt-2">
                <label><b>Atividades desenvolvidas:</b></label>
            </div>
            <div class="vacancie-profile pl-2 pr-2">
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus, orci vitae sagittis rutrum,
                    dolor diam gravida felis, et pulvinar odio ipsum eget felis. Donec at augue eget metus ultrices
                    molestie. Praesent nisl sem, aliquam in auctor a, rhoncus ut nisi. Proin justo quam, fringilla quis
                    nulla ut, fermentum viverra nisl. Aenean facilisis consequat convallis. Nullam et tempus enim.
                    Vestibulum ullamcorper a lectus feugiat porta. Praesent luctus porttitor leo ac mattis. Fusce massa
                    felis, sodales sit amet egestas id, suscipit in mi. Proin pulvinar commodo magna ac fringilla. Morbi
                    eget arcu convallis felis vestibulum lacinia id vitae quam. Mauris quis commodo mauris.
                </span>
            </div>

            <div class="col-sm-12 text-center mt-3 mb-3">
                <a href="" class="btn btn-vacancie-release">Liberar</a>
                <a href="" class="btn btn-vacancie-delete">Excluir</a>
            </div>
        </div>
    </div>

@endforeach
