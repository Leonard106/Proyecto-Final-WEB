<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: ./index.php");
    exit();
}
$usuario = $_SESSION['username'];

include('./controller/conexion.php');

$consulta = "SELECT * FROM usuarios";
$result = $conn->query($consulta);

$id_en_edicion = isset($_GET['editar']) ? $_GET['editar'] : null;
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
                
                <form method="POST" action="./controller/create.php">
                    
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
                        <div class="input-field col s12 m3">
                            <i class="material-icons prefix">phone</i>
                            <input id="telefono" type="text" name="telefono" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m1">
                            <button class="btn-floating btn-large waves-effect waves-light light-blue darken-4" type="submit">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
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
                            
                            <?php if ($id_en_edicion == $row['id']) { ?>
                                <tr class="blue lighten-5">
                                    <td><?php echo $row['id']; ?></td>
                                    
                                    <td>
                                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" form="form-editar-<?php echo $row['id']; ?>" required>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="<?php echo $row['email']; ?>" form="form-editar-<?php echo $row['id']; ?>" required>
                                    </td>
                                    <td>
                                        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" form="form-editar-<?php echo $row['id']; ?>" required>
                                    </td>
                                    
                                    <td>
                                        <form method="POST" action="./controller/update.php" id="form-editar-<?php echo $row['id']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            
                                            <button type="submit" class="btn-small green waves-effect waves-light">
                                                <i class="material-icons">save</i>
                                            </button>
                                            
                                            <a href="paginaPrincipal.php" class="btn-small red darken-1 waves-effect waves-light">
                                                <i class="material-icons">cancel</i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>

                            <?php } else { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td>
                                        <a href="paginaPrincipal.php?editar=<?php echo $row['id']; ?>" class="btn-small blue waves-effect waves-light">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        
                                        <a href="./controller/delete.php?id=<?php echo $row['id']; ?>" class="btn-small red waves-effect waves-light" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

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