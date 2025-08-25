<?php
$host = 'localhost';
$dbname = 'mi_base'; 
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"], $_POST["email"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];

        $sql = "INSERT INTO usuarios (id, nombre, correo) VALUES (NULL, :nombre, :correo)";
        $statement = $conexion->prepare($sql);
        $statement->execute([
            "nombre" => $nombre,
            "correo" => $email
        ]);
    }

    
    if (isset($_GET["eliminar_id"])) {
        $id = $_GET["eliminar_id"];
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $statement = $conexion->prepare($sql);
        $statement->execute(["id" => $id]);

        
        header("Location: index.php");
        exit;
    }

    
    $statement = $conexion->query("SELECT * FROM usuarios");
    $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
    exit;
}

require "index.view.php";
?>