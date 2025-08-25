<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Editar Usuario</h1>

  <form action="editar.php?id=<?php echo $usuario['id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" required>

    <label for="correo">Correo:</label>
    <input type="email" name="correo" id="correo" value="<?php echo $usuario['correo']; ?>" required>

    <button type="submit">Actualizar Usuario</button>
  </form>

  <br>
  <a href="index.php">Volver</a>
</body>
</html>