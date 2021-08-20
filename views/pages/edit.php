<?php
    if( isset($_GET["id"]) ){
        $field = "id";
        $id = $_GET["id"];

        $user = FormController::readUser($field, $id);
        // echo "<pre>"; print_r($user); echo "</pre>";
    }
?>

<div class="d-flex justify-content-center">
    <form action="" class="bg-secondary py-4 px-5 rounded" method="POST">
        <h2 class="text-center text-white mb-4">Editar mi información</h2>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Usuario" name="username" value="<?php echo $user['usuario']; ?>" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-at"></i></span>
            <input type="email" class="form-control" placeholder="e-mail" name="email" value="<?php echo $user['correo']; ?>" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            <input type="password" class="form-control" placeholder="Cambiar mi contraseña" name="password">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            <input type="password" class="form-control" placeholder="Contraseña actual" name="currentPassword" required>
        </div>

        <div class="input-group mt-4">
            <button type="submit" class="btn btn-primary mx-auto px-4">Actualizar</button>
        </div>
    </form>
</div>

<?php
    $controller = new FormController();
    $controller->updateUser($id);
?>