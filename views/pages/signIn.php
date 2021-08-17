<div class="d-flex justify-content-center">
    <form action="" class="bg-secondary py-4 px-5 rounded" method="POST">
        <h2 class="text-center text-white mb-4">Crear cuenta</h2>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Usuario" name="username" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-at"></i></span>
            <input type="email" class="form-control" placeholder="e-mail" name="email" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
            <input type="password" class="form-control" placeholder="Confirmar contraseña" name="password" required>
        </div>

        <div class="input-group mt-4">
            <button type="submit" class="btn btn-primary mx-auto px-4">Registrarme</button>
        </div>
    </form>
</div>
<?php
    // Running a static method: Allow use data that controller returns
    $status = FormController::signIn();
    if( $status == "successful"){
        echo '<div class="alert alert-success col-xl-3 col-sm-6 mx-auto d-flex justify-content-center notify py-3">Usuario creado con éxito</div>';
        echo '<script>
            if( window.history.replaceState ){
                window.history.replaceState( null, null, window.location.href );
            }
            </script>';
    }
?>
