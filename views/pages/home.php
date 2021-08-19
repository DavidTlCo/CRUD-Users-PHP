<?php
    $users = FormController::readUsers();
    // echo "<pre>"; print_r($users); echo "</pre>";
?>

<table class="table table-hover caption-top">
    <caption>List of users</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Correo</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $key => $user){ ?>
        <tr>
            <td><?php echo ($key+1) ?></td>
            <td><?php echo $user["usuario"]; ?></td>
            <td><?php echo $user["correo"]; ?></td>
            <td><?php echo $user["creado"]; ?></td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-primary me-1 rounded"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger rounded "><i class="fas fa-trash-alt"></i></button>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>