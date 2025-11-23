<?php
$host = "localhost:3306";
$user = "root";
$pass = "r4T8n34*";
$db = "crud_app";

$conn = new mysqli($host,$user,$pass,$db);

if( $conn ->connect_error ){
    die("Conexion con error". $conn->connect_error);
}
?>