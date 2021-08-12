@extends('welcome')

@section('content')
    <div class="navegacionBotones">
        <button type="button" class="btn btn-warning">Detalles</button>
        <button type="button" class="btn btn-primary">Propuestas</button>
    </div>
   
    <div class="cajaPadre">
        <section class="izquierda">

            <div class="detallessuperior1">
                <h2>Haga una oferta a este trabajo </h2>
            </div>

            <div class="detallessuperior2">
                <h3>Detalles de la oferta</h3>
               
                <form  method="post" action="{{route('contactarEmpleador.store')}}" id="formulario">
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
                        <input  name="id_oc" type="hidden" value="<?php echo $_GET['ide']; ?>">
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

        </section>
        <aside class="derecha">

            <div class="EncabezadoAside">
                <p>Como escribir una oferta ganadora</p>
            </div>
            <div class="cuerpo">
                <br>
                <span>Las grandes ofertas son  </span> <br>
                <span>aquellas que:</span>

                <ul><br>
                    <li><span>Son mas atractivos y están bien escritos sin errores ortograficos.</span></li> <br>
                    <li><span>Explique cómo se relacionan sus habilidades y experiencias con el trabajo a postular. </span>
                    </li> <br>
                    <li><span>Haga preguntas para aclarar cualquier detalle poco claro. </span></li>
                </ul>
            </div>



        </aside>
    </div>
<script>
  window.addEventListener("load", function() {
  formulario.importe.addEventListener("keypress", soloNumeros, false);
  formulario.dias.addEventListener("keypress", soloNumeros, false);
});

function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}
</script>
@endsection
