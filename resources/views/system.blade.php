@include('templates.header')

    <div class="container">
        
        <h1 class="py-5">Agregar contenido</h1>

        <form class="row g-3">

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
                        <input type="number" name="inPrice" class="form-control" placeholder="Precio entrada" aria-label="precio" aria-describedby="basic-addon1">
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
                <button class="btn btn-primary" type="submit">Agregar contenido</button>
            </div>

        </form>
    </div>

@include('templates.footer')