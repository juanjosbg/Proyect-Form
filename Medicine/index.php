<?php 
    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Debes iniciar sesión");
            </script>
        ';
        header("Location: ../index.php");
        session_destroy();
        die();
    }
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - App</title>
</head>
<body>
    <h1>Esto es una prueba</h1>
</body>
</html>