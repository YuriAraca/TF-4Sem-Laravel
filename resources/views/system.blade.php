@include('templates.header')

    <div class="container border my-5">

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

        
        <h1 class="py-5">Agregar contenido</h1>

        <form class="row g-3" method="POST">

            @csrf

            <div class="row">
                <div class="input-group mb-3 col">
                    <label for="region" class="form-label">Region</label>
                    <div class="input-group">
                        <input type="text" name="region" class="form-control" id="region" placeholder="Region" aria-label="Region" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <div class="input-group">
                        <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" aria-label="Ciudad" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <label for="lugar" class="form-label">Lugar Turistico</label>
                <div class="input-group">
                    <input type="text" name="lugarTuristico" class="form-control" id="lugar" placeholder="Lugar turistico" aria-label="lugar" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Descripcion</span>
                <textarea class="form-control" name="descripcion" aria-label="Descripcion"></textarea>
            </div>

            <div class="row">
                <div class="input-group mb-3 col">
                    <label for="precio" class="form-label">Precio entrada</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S/ </span>
                        <input type="number" name="inPrice" class="form-control" placeholder="0" aria-label="precio" aria-describedby="basic-addon1">
                    </div>
                </div>                
                    
                <div class="input-group mb-3 col">
                    <label for="inTime" class="form-label">Hora entrada</label>
                    <div class="input-group">
                        <input type="time" name="inTime" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>
                </div>

                <div class="input-group mb-3 col">
                    <label for="outTime" class="form-label">Hora salida</label>
                    <div class="input-group">
                        <input type="time" name="outTime" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <label for="imagen" class="form-label">Imagen</label>
                <div class="input-group">
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>

            <div>
                <p class="btn btn-primary" id="btnDesplegarSectionActividad">Agregar actividad</p>
            </div>

            <div id="sectionActividad" style="display: none;">

                <div class="input-group mb-3 col">
                    <label for="actividad" class="form-label">Actividad</label>
                    <div class="input-group">
                        <input type="text" name="actividad" class="form-control" placeholder="Nombre de actividad">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Descripcion de actividad</span>
                    <textarea class="form-control" name="descripcionActividad" aria-label="Descripcion actividad"></textarea>
                </div>

                <div class="row">
                    <div class="input-group mb-3 col">
                        <label for="priceActividad" class="form-label">Precio actividad</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">S/ </span>
                            <input type="number" name="priceActividad" class="form-control" placeholder="0" aria-label="precio actividad" aria-describedby="basic-addon1">
                        </div>
                    </div> 
    
                    <div class="input-group mb-3 col">
                        <label for="duracionActividad" class="form-label">Duracion de actividad</label>
                        <div class="input-group">
                            <input type="time" name="duracionActividad" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
                
            </div>
                
            <button class="btn btn-success" type="submit">Agregar contenido</button>
            
        </form>
    </div>

@include('templates.footer')