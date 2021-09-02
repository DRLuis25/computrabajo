@extends('layouts.admin.app')

@section('content')
<h5 style="margin-left: 45%">REPORTES DIARIOS</h5>
<div class="card" style="margin:15px ">
    <div class="card-body">

        <div  class="row">

            <div class="col-7">

                <form action="" id="form-consulta">
                    <div class="form-group row">
                        <select name="mes" id="mes" class="form-control col-3" required>
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
                        <select name="dia" id="dia" class="form-control col-3" required>
                            <option value="">Seleccione un dia</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
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
