@extends('welcome')

@section('content')
    <div class="cajaPadre">
        <div class="card">
            <div class="card-header" style="background:white;">
                <div>
                    <h4>Detalles del Proyecto</h4>
                </div>

                <div class="Detalles_derecha">
                    <div class="D_min">
                        <span>Presupuesto: {{ $detalles_Proyecto->pago_propuesto_min }} -
                            {{ $detalles_Proyecto->pago_propuesto_max }}
                            S/.</span>
                    </div>
                    <div class="D_min">
                        <span>La Licitación termina el {{ $detalles_Proyecto->fecha_expiracion }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <span class="card-title">{{ $detalles_Proyecto->descripcion }}</span>
                
            </div>
        </div>

        <div class="derecha1">

            <div class="EncabezadoAside">
                <p>Como escri</p>
            </div>
        </div>

        <div class="izquierda">

            <div class="detallessuperior1">
                <h2>Haga una oferta a este trabajo </h2>
            </div>

            <div class="detallessuperior2">
                <h3>Detalles de la oferta</h3>

                <form method="post" action="{{ route('contactarEmpleador.store') }}" id="formulario">
                    @csrf
                    <div class="inputs">

                        <div>
                            <p class="p1">Importe de la oferta</p>
                            <div class="input-group">
                                <span class="input-group-addon">S/.</span>
                                <input type="text" class="form-control" name="importe" id="importe">
                                <span class="input-group-addon">Soles</span>
                            </div>
                        </div>
                        <input name="id_oc" type="hidden" value="<?php echo $_GET['ide']; ?>">
                        <div>
                            <p class="p2">Este trabajo se entregara en</p>
                            <div class="input-group" style="margin-left:7Vw;">
                                <input type="text" class="form-control" name="dias" id="dias">
                                <span class="input-group-addon">Dias</span>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="dettallesinferior">
                        <h5>Describe tu propuesta</h5>
                        <textarea class="form-control" rows="3" name="descripcion"></textarea>
                    </div>

                    <div class="acomodarboton">
                        <input type="submit" value="Postular a este trabajo" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>

        <div class="derecha2">

            <div class="EncabezadoAside">
                <p>Como escribir una oferta ganadora</p>
            </div>
            <div class="cuerpo" id="cuerpo">
                <br>
                <span>Las grandes ofertas son </span> <br>
                <span>aquellas que:</span>

                <ul><br>
                    <li><span>Son mas atractivos y están bien escritos sin errores ortograficos.</span></li> <br>
                    <li><span>Explique cómo se relacionan sus habilidades y experiencias con el trabajo a postular. </span>
                    </li> <br>
                    <li><span>Haga preguntas para aclarar cualquier detalle poco claro. </span></li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load", function() {
            formulario.importe.addEventListener("keypress", soloNumeros, false);
            formulario.dias.addEventListener("keypress", soloNumeros, false);
            document.getElementById('text-end').style.display = 'none';
        });

        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }
    </script>
@endsection
