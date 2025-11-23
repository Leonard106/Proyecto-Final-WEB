<?php
session_start();

// 1. Verificación de sesión
if (!isset($_SESSION['username'])) {
    header("location: ./index.php");
    exit();
}
$usuario = $_SESSION['username'];

include('./logica/conexion.php');

// 2. Lógica para AGREGAR USUARIO (Se ejecuta al enviar el formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'agregar') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Asegúrate de usar $conn (o como se llame tu variable en conexion.php)
    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la misma página para evitar reenvío de formulario al actualizar
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 3. Lógica para LEER USUARIOS (Se ejecuta siempre al cargar la página)
$consulta = "SELECT * FROM usuarios";
$result = $conn->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php include('./head.php'); ?>

    <div class="container">
        
    <div class="card z-depth-1" style="margin-top: 20px;">
            <div class="card-content">
                <span class="card-title orange-text text-darken-2">Agregar Usuario</span>
                
                <form method="POST" action="">
                    <input type="hidden" name="action" value="agregar">
                    
                    <div class="row" style="margin-bottom: 0;">
                        
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">person</i>
                            <input id="nombre" type="text" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" name="email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">phone</i>
                            <input id="telefono" type="text" name="telefono" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                    </div>

                    <div class="row center-align">
                        <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
                            Agregar <i class="material-icons right">add_circle</i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <div class="divider"></div>

        <div class="section">
            <h4 class="orange-text center-align">Lista de Usuarios</h4>
            
            <table class="striped highlight responsive-table centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($result->num_rows > 0) { ?>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td>
                                <a href="./logica/update.php?id=<?php echo $row['id']; ?>" class="btn-small blue waves-effect waves-light">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="./logica/delete.php?id=<?php echo $row['id']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="center-align">No hay usuarios registrados</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
<?php include('./footer.php'); ?>
</html>