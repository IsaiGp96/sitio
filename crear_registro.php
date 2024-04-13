<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "";
$dbname = "sitio_maria";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];

        // Insertar el nuevo registro en la base de datos
        $sql = "INSERT INTO registros (nombre) VALUES (:nombre)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        echo "Nuevo registro creado exitosamente.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>