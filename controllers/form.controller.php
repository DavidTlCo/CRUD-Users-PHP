<?php
    class FormController{

        static public function signIn(){
            // return $_POST["username"]."<br>".$_POST["email"]."<br>".$_POST["pass"]."<br>";
            if( isset($_POST["username"]) )
                return "successful";
        }
    }
?>