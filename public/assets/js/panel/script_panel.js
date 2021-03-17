$(document).ready(function () {
    var input = document.getElementById('search');
    var click = document.getElementById('a_search');
    click.onclick = function () {
        input.style.display = 'block';
        click.style.display = 'none';
    }

    input.onblur = function () {
        input.style.display = 'none';
        click.style.display = 'block';
    }

    mask();
    btnUpload()
});

//gráfico
if (document.getElementById('myChart')) {

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Novos Assinantes',
                data: [12, 19, 13, 15, 12, 13],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
            {
                label: 'Assinaturas canceladas',
                data: [2, 9, 3, 5, 2, 3],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}


//função de mascára input
function mask() {
    $('#phone').mask('(00) 0 0000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#birthday').mask('00/00/0000');
}

//upload image perfil
function btnUpload() {
    $('#BSbtndanger').filestyle({
        iconName: 'fas fa-upload',
        buttonName: 'btn-danger',
        buttonText: ' Seleciona a Imagem'
    });
    $('#BSbtnsuccess').filestyle({
        buttonName: 'btn-success',
        buttonText: ' Open'
    });
    $('#BSbtninfo').filestyle({
        buttonName: 'btn-info',
        buttonText: ' Select a File'
    });
}

$('#image').on('change', function () {
    let image = this.files[0].name;
    let filename = $('#filename');
    filename.html(image);
});

