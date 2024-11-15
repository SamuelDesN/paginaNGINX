<?php
$e=$_POST["nombre"];
$f=$_POST["nombre3"];
$g=$_POST["apellido3"];
$h=$_POST["apellido4"];
$i=$_POST["direccion2"];
$o=$_POST["telefono2"];
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$sql = "CREATE DATABASE IF NOT EXISTS pruebaAgenda";
$conn->query($sql);
$sql3=mysqli_select_db( $conn, 'pruebaAgenda' );
$sql4 = "CREATE TABLE IF NOT EXISTS clientes (
    nombre VARCHAR(30) , 
    apellido1 VARCHAR(30),
    apellido2 VARCHAR(30),
    direccion VARCHAR(30),
    telefono INT(9) 
    )";
 $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('$f','$g','$h','$i',$o)";
 $conn->query($sql6);

    echo "<div id='clienteBorrado'>";
    echo "<p>Cliente modificado correctamente</p>";
    echo "<form action=modificar.php method='POST'>";
    echo "<input type='hidden' name='nombre' value='$e'>";
    echo " <input type='submit' class='submit' value='Volver'></button>";
    echo "</form>";
    echo "</div>";
    ?>