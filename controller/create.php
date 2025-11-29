<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../paginaPrincipal.php");
        exit();
    } else {
        echo "Error al crear: " . $conn->error;
    }
} else {
    header("Location: ../paginaPrincipal.php");
    exit();
}
?>