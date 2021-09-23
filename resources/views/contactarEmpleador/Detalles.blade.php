@extends('welcome')

@section('content')
    <div class="cajaPadre">
        {{-- Dettalles del Proecto --}}
        <div class="card" id="card">
            <div class="card-header" style="background:white;" id="card-header">
                <div>
                    <h4>Detalles del Proyecto</h4>
                </div>

                <div class="Detalles_derecha">
                    <div class="D_min">
                        <span>Presupuesto: S/. {{ $detalles_Proyecto->pago_propuesto_min }} -
                            {{ $detalles_Proyecto->pago_propuesto_max }}</span>
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
        {{-- Detalles Cliente --}}
        <div class="derecha1">

            <div class="EncabezadoAside" style="padding: 2vh 2vw;">
                <b>Detalles del Anunciante</b>
            </div>
            <div style="padding: 2vh 1vw;"><?php
$nombre = $detalles_anunciante->name;
$mi = $detalles_anunciante->created_at;
$miembro = strstr($mi, ' ', true);
$user = strstr($nombre, ' ', true);
?>
                <span> <i class="fa fa-user"></i>&nbsp;{{ $user }}
                    {{ $detalles_anunciante->apellidos }}</span><br>
                <span> <i class="fa fa-check"> </i>&nbsp;</i><?php $num = $detalles_anunciante->calificacion_empleador;
if ($num == 0) {
    echo '<i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                              <i class="fa fa-star" ></i>';
}
if ($num == 1) {
    echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>';
}
if ($num == 2) {
    echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star"  style="color: orange"  ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>';
}
if ($num == 3) {
    echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" id="2estrella"  style="color: orange"  ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" id="3estrella"  style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" id="4estrella" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" id="5estrella" ></i>';
}
if ($num == 4) {
    echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange"  ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" ></i>';
}
if ($num == 5) {
    echo '<i class="fa fa-star" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange"  ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                                                                                                                              <i class="fa fa-star" style="color: orange" ></i>';
}
?></span><br>
                <span><i class="fa fa-map-marker"></i>&nbsp; {{ $detalles_anunciante->direccion }}</span><br>
                <span><i class="fa fa-clock-o"></i>&nbsp;Miembro desde {{ $miembro }}</span>
            </div>
        </div>
        {{-- Llenar oferta de Trabajo --}}
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
                        <div >
                            <p class="p2" >Este trabajo se entregara en</p>
                            <div class="input-group" style="margin-left:7Vw;">
                                <input type="text" class="form-control" name="dias" id="dias">
                                <span class="input-group-addon">Dias</span>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="dettallesinferior">
                        <h5>Describe tu propuesta</h5>
                        <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
                    </div>

                    <div class="acomodarboton">
                        <input type="submit" value="Postular a este trabajo" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>

        {{-- Pautas de Redaccion --}}
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
        const importe = document.getElementById("importe")
        const dias = document.getElementById("dias")
        const descripcion = document.getElementById("descripcion")
        const form = document.getElementById("formulario")

        form.addEventListener("submit", e=>{
        
            if (importe.value.length < 1 || dias.value.length < 1 || descripcion.value.length <1 ) {
                e.preventDefault() 
                Swal.fire({
                    icon: 'warning',
                    title: 'Para continuar...',
                    text: 'Por favor llene todos los campos!'
                })
            } else if (descripcion.value.length >= 1 && descripcion.value.length < 50){
                    e.preventDefault() 
                    Swal.fire('Su propuesta debe tener almenos 50 caracteres!')
                }
        })
    </script>
@endsection
