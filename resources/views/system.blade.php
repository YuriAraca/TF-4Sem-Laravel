@include('templates.header')

    <div class="container border my-5">
        @if(!empty($lugar->lugar))
            <h1 class="py-5">Actualizar contenido</h1>
        @else
            <h1 class="py-5">Agregar contenido</h1>
        @endif

        <form class="row g-3" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="input-group mb-3 col">
                    <label for="region" class="form-label">Region</label>
                    <div class="input-group">
                        <input type="text" name="region" class="form-control" id="region" value="@if(!empty($lugar->region)){{$lugar->region}}@endif" placeholder="Region" aria-label="Region" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <div class="input-group">
                        <input type="text" name="ciudad" class="form-control" id="ciudad" value="@if(!empty($lugar->ciudad)){{$lugar->ciudad}}@endif" placeholder="Ciudad" aria-label="Ciudad" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <label for="lugar" class="form-label">Lugar Turistico</label>
                <div class="input-group">
                    <input type="text" name="lugarTuristico" class="form-control" id="lugar" value="@if(!empty($lugar->lugar)){{$lugar->lugar}}@endif" placeholder="Lugar turistico" aria-label="lugar" aria-describedby="basic-addon1" required>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Descripcion</span>
                <textarea class="form-control" name="descripcion" aria-label="Descripcion">@if(!empty($lugar->descripcion)){{$lugar->descripcion}}@endif</textarea>
            </div>

            <div class="row">
                <div class="input-group mb-3 col">
                    <label for="precio" class="form-label">Precio entrada</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S/ </span>
                        <input type="number" name="inPrice" value="@if(!empty($lugar->inprice)){{$lugar->inprice}}@endif" class="form-control" placeholder="0" aria-label="precio" aria-describedby="basic-addon1">
                    </div>
                </div>                
                    
                <div class="input-group mb-3 col">
                    <label for="inTime" class="form-label">Hora entrada</label>
                    <div class="input-group">
                        <input type="time" name="inTime" value="@if(!empty($lugar->intime)){{$lugar->intime}}@endif" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>
                </div>

                <div class="input-group mb-3 col">
                    <label for="outTime" class="form-label">Hora salida</label>
                    <div class="input-group">
                        <input type="time" name="outTime" value="@if(!empty($lugar->outtime)){{$lugar->outtime}}@endif" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <label for="imagen" class="form-label">Imagen</label>
                <div class="input-group">
                    <input type="file" name="imagen" class="form-control" required>
                </div>
            </div>
            @if(empty($lugar->lugar))
                <div>
                    <p class="btn btn-primary" id="btnDesplegarSectionActividad">Agregar actividad</p>
                </div>
            @endif
            <div id="sectionActividad" style="display: none;">

                <div class="input-group mb-3 col">
                    <label for="actividad" class="form-label">Actividad</label>
                    <div class="input-group">
                        <input type="text" name="actividad" value="" class="form-control" placeholder="Nombre de actividad">
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
            @if(!empty($lugar->lugar))
                <button class="btn btn-success" type="submit">Actualizar contenido</button>
            @else
                <button class="btn btn-success" type="submit">Agregar contenido</button>
            @endif
        </form>
    </div>

@include('templates.footer')