<?php
$host = 'localhost';
$dbname = 'mi_base'; 
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $statement = $conexion->prepare($sql);
        $statement->execute(['id' => $id]);
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            die("Usuario no encontrado.");
        }

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];

            $sql = "UPDATE usuarios SET nombre = :nombre, correo = :correo WHERE id = :id";
            $statement = $conexion->prepare($sql);
            $statement->execute([
                'nombre' => $nombre,
                'correo' => $correo,
                'id' => $id
            ]);

            
            header("Location: index.php");
            exit;
        }
    } else {
        echo "ID de usuario no proporcionado.";
        exit;
    }

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

require "editar.view.php";
?>
