<?php
    class FormController{
        static public function signIn(){
            if( isset($_POST["username"]) ){
                // Verifying that password and its confirmation are equals
                if( $_POST["pass"] == $_POST["password"]  ){
                    // Then save user created
                    $table = "usuarios";
                    $data = array("username" => $_POST["username"], 
                                "email" => $_POST["email"],
                                "password" => $_POST["password"]);
                    // Create a new user in table, with data input
                    $response = FormModel::createUser($table, $data);
                    return $response;
                // Or return error in password match
                }else
                    return "passMatch";
            }
        }

        static public function readUser($field, $value){
            $table = "usuarios";
            $response = FormModel::readUser($table, $field, $value);
            return $response;
        }

        public function login(){
            if( isset($_POST["search"]) ){
                $value = $_POST["search"];
                // If data receoved is an email
                if (strpos($value, '@'))
                    $field = "correo";
                // else, is an username
                else
                    $field = "usuario";
                $table = "usuarios";
                // Invoque query from model
                $response = FormModel::readUser($table, $field, $value);
                // If query returns data not empty, else: user not exist
                if( $response )
                    // If response is not empty, compare pass from input and data from DB
                    if( $response["contrasenia"] == $_POST["password"]){
                        echo '<script>window.location="?page=home"</script>';
                        $_SESSION["logued"]="ok";
                    }else
                        echo '<div class="alert alert-danger col-xl-3 col-sm-6 mx-auto d-flex justify-content-center notify py-3">Contraseña incorrecta</div>';
                else
                    echo '<div class="alert alert-danger col-xl-3 col-sm-6 mx-auto d-flex justify-content-center notify py-3">Usuario/correo no existe</div>';
                echo '<script>
                if( window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href );
                }
                </script>';
                // echo "<pre>"; print_r($response); echo "</pre>";
            }
        }
        
        public function updateUser($id){
            if( isset($_POST["username"]) ){
                if( $_POST["password"] == "" ){
                    $newPassword = $_POST["currentPassword"];
                }else{
                    $newPassword = $_POST["password"];
                }
                $currentPassword = $_POST["currentPassword"];
                $table = "usuarios";
                $data = array(
                    "id" => $id,
                    "username" => $_POST["username"],
                    "email" => $_POST["email"],
                    "password" => $newPassword);
                $response = FormModel::updateUser($table, $data, $currentPassword);
                if($response == "successful"){
                    echo '<div class="alert alert-success col-xl-3 col-sm-6 mx-auto d-flex justify-content-center notify py-3 text-center">Datos de usuario actualizados con éxito</div>';
                }
                if( $response == "errorPassword"){
                    echo '<div class="alert alert-danger col-xl-3 col-sm-6 mx-auto d-flex justify-content-center notify py-3 text-center">Contraseña actual incorrecta. Comprueba tu identidad</div>';
                }
                echo '<script>
                if( window.history.replaceState ){
                    window.history.replaceState( null, null, window.location.href );
                }
                setTimeout(function() {
                    window.location = "?page=home";
                }, 4000);
                </script>';
            }
        }
    }
?>