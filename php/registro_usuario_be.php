<?php
include 'conexion_be.php';

// Escapa los datos para prevenir inyecciones SQL
$nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

// Verifica que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
        <script>
            alert("Este correo ya fue registrado anteriormente");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Verifica que el nombre de usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
        <script>
            alert("Este usuario ya se encuentra registrado");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Inserta el nuevo usuario si el correo y el nombre de usuario no están registrados
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contraseña)
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Usuario creado con éxito");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Hubo un error al crear el usuario");
            window.location = "../index.php";
        </script>
    ';
}

// Cierra la conexión
mysqli_close($conexion);
?>