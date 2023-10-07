@include('templates.header')

<div class="container border my-5 py-5 px-3" style="width: 300px">
    
    <h2>Registro</h2>
    <form action="/register" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Nombre">
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Correo electrónico</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Contraseña</label>
        </div>
        <input type="submit" class="form-control bg-success mt-3" value="Registrarme">
    </form>
    
</div>

@include('templates.footer')