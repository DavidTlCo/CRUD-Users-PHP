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

        static public function readUser($table, $field, $value){
            if( $field == null && $value == null){
                $query = Connection::connect()->prepare("SELECT *, DATE_FORMAT(creado, '%d/%m%Y') AS creado FROM $table ORDER BY id DESC");
                $query->execute();
                // Return all registers
                return $query->fetchAll();
            }else{
                // COLLATE utf8_bin: Make a sensitive case query OR WHERE BINARY ...
                // Making a query Select with data received
                $query = Connection::connect()->prepare("SELECT *, DATE_FORMAT(creado, '%d/%m%Y') AS creado FROM $table WHERE $field = :$field COLLATE utf8_bin");
                $query->bindParam(":".$field, $value, PDO::PARAM_STR);
                $query->execute();
                // Gets unique register than matched with query
                return $query->fetch();
            }
            $query = null;
        }

        static public function updateUser($table, $data, $currentPassword){
            $user = FormModel::readUser($table, "id", $data["id"]);
            if( $user["contrasenia"] == $currentPassword ){
                $query = Connection::connect()->prepare("UPDATE $table SET usuario=:username, correo=:email, contrasenia=:pass WHERE id=:id");
                $query->bindParam(":username", $data["username"], PDO::PARAM_STR);
                $query->bindParam(":email", $data["email"], PDO::PARAM_STR);
                $query->bindParam(":pass", $data["password"], PDO::PARAM_STR);
                $query->bindParam(":id", $data["id"], PDO::PARAM_STR);
                if( $query->execute() ){
                    return "successful";
                }else{
                    print_r( Connection::connect()->errorInfo() );
                    return "error";
                }
            }else{
                return "errorPassword";
            }
            $query = null;
        }
    }
?>