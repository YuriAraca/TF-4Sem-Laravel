@include('templates.header')

<div class="container py-5">
    
    <div class="details">
        <div class="row">
            <div class="col">
                <h1>{{$lugar->lugar}}</h1>
                <h4>{{$lugar->region}} - {{$lugar->ciudad}}</h4>
            </div>
            <div class="col">
                <img id="img-details" src="/images/{{$lugar->rutaImagen}}" alt="">
            </div>
        </div>
        
        <div class="row ">
            <div class="col">
                {{$lugar->descripcion}}
            </div>
            <div class="col">
                <div class="text-sm-end">Precio aproximado de entrada:</div>
                <div class="text-sm-end">Hora de entrada:</div>
                <div class="text-sm-end">Hora de salida:</div>
            </div>
            <div class="col">
                <div>S/. {{$lugar->inPrice}}</div>
                <div>{{$lugar->inTime}}</div>
                <div>{{$lugar->outTime}}</div>
            </div>
        </div>
    </div>

    <div class="center">
        <img src="/images/estrella.png" alt="">
        <img src="/images/estrella.png" alt="">
        <img src="/images/estrella.png" alt="">
        <img src="/images/estrella.png" alt="">
        <img src="/images/estrella-false.png" alt="">
    </div>
    @if(!empty($lugar->actividad))
        <div class="row mt-5">
            <h1>Actividades</h1>
            <div class="col">
                <h4>{{$lugar->actividad}}</h4>
                <p>{{$lugar->descripcionActividad}}</p>
            </div>
            <div class="col">
                <h6 class="text-sm-end">Precio de actividad</h6>
                <h6 class="text-sm-end">Duracion de actividad</h6>
            </div>
            <div class="col">
                <div>S/. {{$lugar->precioActividad}}</div>
                <div>{{$lugar->duracionActividad}}</div>
            </div>
            
        </div>
    @endif
</div>
     

@include('templates.footer')