<?php
    session_start();
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "
        SELECT * FROM usuarios 
        WHERE (correo = '$correo' OR usuario = '$usuario') 
        AND contraseña = '$contrasena'
    ");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        header("Location: ../Medicine/");
        exit();
    } else {
        echo '
            <script>
                alert("Este usuario no existe, por favor verifique los datos ingresados");
                window.location = "../index.php";
            </script>
        ';
    }
?>