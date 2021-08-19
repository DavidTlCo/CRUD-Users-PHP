<div class="d-flex justify-content-center">
    <form action="" class="bg-secondary p-4 rounded" method="POST">
        <h2 class="text-center text-white mb-5">Iniciar sesión</h2>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" name="search" placeholder="Usuario o correo" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
        </div>
        <div class="input-group mt-5">
            <button type="submit" class="btn btn-primary mx-auto">Iniciar sesión</button>
        </div>
    </form>
</div>
<div class="container text-center">
    <a href="?page=signIn" class="fs-6"><small>Aún no tengo una cuenta</small></a>
</div>
<?php 
    $controller = new FormController();
    $controller->login();
?>