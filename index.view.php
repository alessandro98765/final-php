<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <h1>Gestion de usuarios</h1>
  <form action="index.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo electronico" required>
    <button type="submit"> Agregar Usuario</button>
  </form>

  <h2>Lista de Usuarios</h2>
<!--   
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>
    <tr>
      <td>1</td>
      <td>carlos</td>
      <td>carlos@gmail.com</td>
      <td>
        <a href="#">Editar</a>
        <a href="#">Eliminar</a>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>diego</td>
      <td>diego@gmail.com</td>
      <td>
        <a href="#">Editar</a>
        <a href="#">Eliminar</a>
      </td>
    </tr>
    <tr>
      <td>3</td>
      <td>jose</td>
      <td>jose@gmail.com</td>
      <td>
        <a href="#">Editar</a>
        <a href="#">Eliminar</a>
      </td>
    </tr>
  </table> -->

  <table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Acciones</th>
  </tr>

  <?php foreach( $usuarios as $usuario){ ?>
  <tr>
    <td><?php echo $usuario["id"]; ?></td>
    <td><?php echo $usuario["nombre"]; ?></td>
    <td><?php echo $usuario["correo"]; ?></td>
    <td>
  <a href="editar.php?id=<?php echo $usuario['id']; ?>">Editar</a> |
  <a href="index.php?eliminar_id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
</td>
  </tr>
  <?php } ?>  
</table>

</body>
</html>