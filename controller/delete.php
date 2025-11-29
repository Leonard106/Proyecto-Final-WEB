<?php
include('conexion.php');

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../paginaPrincipal.php');
    exit();
} else {
    echo "Error al eliminar: " . $sql->error;
}
?>