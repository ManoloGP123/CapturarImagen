<?php
// Verifica si se ha enviado una imagen
if (isset($_POST['imagen'])) {
    $imagen = $_POST['imagen'];

    // Guarda la imagen en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ingresos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (capturas) VALUES ('$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Guardada correctamente";
    } else {
        echo "Error al guardar la captura: " . $conn->error;
    }

    $conn->close();
}
?>
