<?php
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_completo,correo,usuario,contraseña)
            VALUES ('$nombre_completo','$correo','$usuario','$contraseña')";
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
            <script>
                alert("usuario creado con exito");
                window.location = "../index.php";
            </script>
        '
    }
?>