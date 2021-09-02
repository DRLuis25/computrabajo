@extends('layouts.admin.app')

@section('content')
<h5 style="margin-left: 45%">REPORTES DIARIOS</h5>
<div class="card">
    <div class="card-body">

        <div  class="row">

            <div class="col-7">

                <form action="" id="form-consulta">
                    <div class="form-group row">
                        <select name="mes" id="mes" class="form-control col-3" required>
                            <option value="">Seleccione un mes</option>
                            <option value="01">Enero</option>
                            <option value="08">Agosto</option>
                        </select>
                        <select name="dia" id="dia" class="form-control col-3" required>
                            <option value="">Seleccione un dia</option>
                            <option value="25">25</option>
                            <option value="26" selected>26</option>
                        </select>
                        <input type="submit" value="Consultar" class="btn btn-primary col-2">
                    </div>
                </form>
                <h5>TRABAJOS PUBLICADOS</h5>
            </div>

            <div class="col-3">
                <div  class="chart-container" style="position: relative;  width:25vw">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var myChart;
    var datas = [{
                    label: '# of Votes',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }];
    var ctx = document.getElementById('myChart').getContext('2d');
    $.get(`/admin/rdiarios/{{$mes}}/{{$dia}}`,function (res, sta) {
        datas[0].data = res.datos;
         myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: res.labels,
                datasets:datas
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        myChart.resize();
    });
    $('#form-consulta').on('submit',function (e) {
        e.preventDefault();
        let mes = $('#mes').val();
        let dia = $('#dia').val();
        $.get(`/admin/rdiarios/${mes}/${dia}`,function (res, sta) {

            myChart.data.datasets[0].data = res.datos;
            myChart.update();
        });
    })
    </script>
@endsection
