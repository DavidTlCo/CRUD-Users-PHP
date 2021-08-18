<?php
    require_once "config.db.php";

    class FormModel{
        static public function createUser($table, $data){
            // Prepare a query to be executed by the method PDOStatement::execute with zero or more params
            $query = Connection::connect()->prepare("INSERT INTO $table(usuario, correo, contrasenia) VALUES(:usuario, :correo, :contrasenia)");
            // linked a PHP var with a param with name matched with SQL query to prepare the sentence
            $query->bindParam(":usuario", $data["username"], PDO::PARAM_STR);
            $query->bindParam(":correo", $data["email"], PDO::PARAM_STR);
            $query->bindParam(":contrasenia", $data["password"], PDO::PARAM_STR);
            // If query execute successful...
            if ( $query->execute() ){
                return "successful";
            }else{
                // print_r( Connection::connect()->errorInfo() );
                return "error";
            }
            $query = null;
        }
    }
?>