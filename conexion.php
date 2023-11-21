<?php
    $servidor="localhost";
    $db="phpcrud";
    $username="root";
    $password="";

    try {
        $conexion=new PDO("mysql:host=$servidor;dbname=$db",$username,$password);
        session_start();
        //echo "conexion exitosa";
    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>