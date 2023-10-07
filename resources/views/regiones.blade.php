@include('templates.header')

<div class="container">
    
    @foreach($regiones as $region)
        <div class="border my-5">
            <h1>Region: {{ $region['nombre'] }}</h1>
            @foreach($region['ciudades'] as $ciudad)
                <div class="ms-5">
                    <h5>Ciudad: {{ $ciudad['nombre'] }}</h5>
                    @foreach($ciudad['lugares'] as $lugar)
                        <div class="ms-5">
                            <p><a href="/lugar-turistico/{{$lugar}}">Lugar turistico: {{ $lugar }}</a></p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach

</div>

@include('templates.footer')