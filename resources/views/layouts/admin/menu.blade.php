<li class="nav-item">
    <a href="{{route('home')}}"
       class="nav-link">
        <p>Volver a inicio</p>
    </a>

    <a href="{{route('admin.home')}}"
       class="nav-link">
        <p>HISTORIAL</p>
    </a>
    <p style="color:white">REPORTES</p>

    <a href="{{route('admin.rdiarios',['mes'=>date("m"),'dia'=>date("d"),'fecha'=>date("Y-m-d")])}}"
        class="nav-link">
         <p>DIARIOS</p>
     </a>
    <a href="{{route('admin.mensuales',date("m"))}}"
       class="nav-link">
       
        <p>MENSUALES</p>
    </a>


</li>
