@include('templates.header')

<div>
    <h1> ¡Viaja y disfruta! con estas ofertas</h1>
</div>

<div class="cajas">

    @foreach ($lugares as $lugar)
        @if($lugar)
            <div class="caja">
                <a href="">
                    
                    <div>
                        <img src="images/{{$lugar['ruta_imagen']}}" alt="">
                    </div>
                    <div class="contenido">
                        <h2>Machu Picchu</h2>
                        {{$lugar['nombre']}}
                        {{$lugar['ruta_imagen']}}
                    </div>
                </a>
            </div>
        @else
            No hay datos
        @endif

    @endforeach

</div>

@include('templates.footer')