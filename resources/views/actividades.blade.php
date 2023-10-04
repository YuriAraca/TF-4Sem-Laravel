@include('templates.header')

    <div class="container">
        @if (empty($actividades))
            No hay datos
        @else
            @foreach ($actividades as $actividad)
                <div class="border border my-5 actividad pulse">
                    <a href="/lugar-turistico/{{$actividad->lugar}}">
                        <div class="row">
                            <h1 class="col">{{$actividad->actividad}}</h1>
                            <h5 class="col">Lugar turistico: {{$actividad->lugar}}</h5>
                        </div>
                        <div class="contenido">
                            <p>{{$actividad->descripcion}}</p>
                            <div class="row">
                                <div class="col">
                                    <div>Precio</div>
                                    <div>Duracion</div>
                                </div>
                                <div class="col">
                                    <div>S/. {{$actividad->precio}}</div>
                                    <div>{{$actividad->duracion}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <form action="borrarActividad" method="post">
                        @csrf
                        <input type="hidden" name="actividadId" value="{{$actividad->id}}">
                        <input type="submit" value="Borrar" class="btn btn-danger">
                    </form>
                </div>
            @endforeach
        @endif
    </div>

@include('templates.footer')