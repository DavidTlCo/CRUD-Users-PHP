<?php
    class Connection{
        static public function connect(){
            // PDO("Nombre del servidor; nombre de DB", "Usuario", "Contraseña");
            $link = new PDO("mysql:host=localhost:3307;dbname=usuarios_php",
                "root",
                "");
            $link->exec("set names utf8");
            return $link;
        }
    }
?>