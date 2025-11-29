<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../paginaPrincipal.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
} else {
    header("Location: ../paginaPrincipal.php");
    exit();
}
?>