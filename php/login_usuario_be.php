<?php
    session_start();
    include 'conexion_be.php';

    // Escapa los datos de entrada para evitar inyecciones SQL
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario ha ingresado un nombre de usuario o correo
    $validar_login = mysqli_query($conexion, "
        SELECT * FROM usuarios 
        WHERE (correo = '$correo' OR usuario = '$usuario') 
        AND contraseña = '$contrasena'
    ");

    if (mysqli_num_rows($validar_login) > 0) {
        // Redirige a la página index.html dentro de la carpeta Medicine
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
