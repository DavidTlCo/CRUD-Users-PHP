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
    }
?>