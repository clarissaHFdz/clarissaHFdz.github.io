<?php
// Obtén los datos del formulario
$nombres = $_POST['nombres'];
$ayuda = $_POST['ayuda'];

// Establecer la conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$database = "paginaraul";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if (empty($nombres) ||  (empty($ayuda))) {
    echo  "rellene todos los campos";
} 
else{

// Crear la consulta SQL para la inserción
// INSERTA LOS DATOS 
$sql = "INSERT INTO comentarios (nombres, ayuda) VALUES ('$nombres','$ayuda')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    header("Location: visualizar.php");
} else {
    echo "Error al insertar el registro: " . $conn->error;
}

// Cierra la conexión
$conn->close();
}

?>