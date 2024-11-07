<?php
    $conexion = mysqli_connect("localhost", "root", "", "login_register_db");
    if($conexion){
        echo 'Conección exitosa';
    } else{
        echo 'La conección con la db no se a podido realizar';
    }
?>