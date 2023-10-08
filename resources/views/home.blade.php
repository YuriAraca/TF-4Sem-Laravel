@include('templates.header')


<div class="container-fluid m-0 p-0">
    <img src="images/banner.jpg" alt="" width="100%">
</div>

<div class="center">
    <form action="" method="post">
        @csrf
        <div class="input-group m-5">
            <input type="text" name="buscar" class="form-control p-3" placeholder="Lugar turistico - region - ciudad" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Buscar" id="basic-addon2" class="input-group-text m-0 btn btn-success">
        </div>
    </form>
</div>

<div class="cajas container">

    <h1 class="p-3"> ¡Viaja y disfruta! Conoce los mejores lugares turisticos del Peru</h1>

    @if (empty($lugares))
    No hay datos
    @else
        @foreach ($lugares as $lugar)
            <div class="caja">
                <a href="/lugar-turistico/{{$lugar->lugar}}">
                    <div>
                        <img src="images/{{$lugar->url}}" alt="">
                    </div>
                    <div class="contenido">
                        <h2>{{$lugar->lugar}}</h2>
                        <div>
                            <p>{{$lugar->region}} - {{$lugar->ciudad}}</p>
                        </div>
                    </div>
                </a>
                @auth
                    <a href="/edit-content/{{$lugar->lugarId}}" class="btn btn-warning">Editar</a>
                    <form action="borrar" method="post">
                        @csrf   
                        <input type="hidden" name="lugarId" value="{{$lugar->lugarId}}">
                        <input type="submit" value="Borrar" class="btn btn-danger">
                    </form>
                @endauth
            </div>
        @endforeach
    @endif

</div>

@include('templates.footer')