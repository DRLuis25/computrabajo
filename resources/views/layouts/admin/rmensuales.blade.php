@extends('layouts.admin.app')

@section('content')
<h5 style="margin-left: 45%">REPORTES MENSUALES</h5>
<div class="card">
    <div class="card-body">

        <div  class="row">

            <div class="col-7">

                <form action="" id="form-consulta">
                    <div class="form-group row" style="margin-left: 100px; margin-top:49px">
                        <select name="mes" id="mes" class="form-control col-4" required>
                            <option value="">Seleccione un mes</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            
                        </select>

                        <input type="submit" value="Consultar" class="btn btn-primary col-2">
                    </div>
                </form>

                <div style="margin-left: 100px;">
                    <h5>TRABAJOS TOTALES</h5>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input type="text" value="" class="form-control" id="direccion" aria-describedby="emailHelp" disabled style="margin-left: 80px;width:100px">
                    </div>
                </div>
            </div>

            <div class="col-3" >
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
                        'rgba(100, 130, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(100, 130, 230, 1)',
                    ],
                    borderWidth: 1
                }];
    var ctx = document.getElementById('myChart').getContext('2d');
    $.get(`/admin/rmensuales/{{$mes}}`,function (res, sta) {
        datas[0].data = res.datos;
         myChart = new Chart(ctx, {
            type: 'pie',
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
        $.get(`/admin/rmensuales/${mes}`,function (res, sta) {
            myChart.data.datasets[0].data = res.datos;
            myChart.update();
        });
    })
    </script>
@endsection

