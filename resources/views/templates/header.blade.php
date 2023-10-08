<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Tours</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="function.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    
    <div class="container-fluid banner">
        <div id="title-head">
            <h1><a href="/">CITY TOURS</a></h1>
        </div>
        <div id="menu-head">
            <ul>
                <li><a href="/">Lugares turisticos</a></li>
                <li><a href="/actividades">Actividades</a></li>
                <li><a href="/regiones">Regiones y ciudades</a></li>

                @guest
                    <div class="btn-group">
                        <img src="images/usuario.png" alt="" data-bs-toggle="dropdown" aria-expanded="false" height="30px">
                        
                        <div class="dropdown-menu" id="menu-in">
                            <div><a href="/login">Iniciar sessión</a></div>
                            <div><a href="/register">Registrarme</a></div>
                        </div>
                    </div>
                @endguest
                @auth
                    <div class="btn-group">
                        <img src="images/usuario.png" alt="" data-bs-toggle="dropdown" aria-expanded="false" height="30px">
                        
                        <div class="dropdown-menu" id="menu-in">
                            <div><a href="">{{ auth()->user()->name }}</a></div>
                            <div><hr class="line-divider"></div>
                            <div><a href="/system">Agregar contenido</a></div>
                            <div><hr class="line-divider"></div>
                            <div><a href="/logout">Cerrar sessión</a></div>
                        </div>
                    </div>
                @endauth
            </ul>
        </div>
        <div id="menu-head-img">
            <div class="btn-group">
                <img src="images/menu.png" alt="" data-bs-toggle="dropdown" aria-expanded="false" height="30px">
                
                <div class="dropdown-menu" id="menu-in">
                    @auth
                        <div><a href="">{{ auth()->user()->name }}</a></div>
                        <div><a href="">{{ auth()->user()->email }}</a></div>
                        <div><hr class="line-divider"></div>
                        <div><a href="/system">Agregar contenido</a></div>
                        <div><hr class="line-divider"></div>
                    @endauth
                    <div><a href="/">Lugares turisticos</a></div>
                    <div><a href="/actividades">Actividades</a></div>
                    <div><a href="/regiones">Regiones y ciudades</a></div>
                    <div><hr class="line-divider"></div>
                    @guest
                        <div><a href="/login">Iniciar sessión</a></div>
                        <div><a href="/register">Registrarme</a></div>
                    @endguest
                    @auth
                        <div><a href="/logout">Cerrar sessión</a></div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger container text-center z-3" role="alert">
            <h4 class="alert-heading">{{ session('error') }}</h4>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success container text-center z-3" role="alert">
            <h4 class="alert-heading">{{ session('success') }}</h4>
        </div>
    @endif

</body>
</html>