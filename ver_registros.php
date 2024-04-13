<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitio_maria";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los registros
    $sql = "SELECT id, nombre FROM registros";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Mostrar los registros en una tabla HTML
    echo "<h2>Registros existentes:</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th></tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td></tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>