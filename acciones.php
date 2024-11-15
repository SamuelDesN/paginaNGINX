<link rel="stylesheet" href="css.css">
<?php
$a=$_POST["nombre"];
$b=$_POST["apellido1"];
$c=$_POST["apellido2"];
$d=$_POST["accion"];
$e=$_POST["usuario"];
#Hacer una pàgina php base de datos  donde hay un login para que solo los usuarios autorizados puedan: ver una lista de clientes, imagen del cliente , datos del cliente etc... boton para el usuario pueda añadir un nuevo cliente,modificar y borrar
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
$conn->query($sql4);
echo "<nav id='menu'>";
echo "<a href='index.html'><img src='home.png'></a><h1 class='gestor'>Pagina gestor clientes</h1><p class='usuario'>$e</a></p>";
echo "</nav>";
 
$sql5 ="SELECT * FROM clientes WHERE nombre='$a' AND apellido1='$b' AND apellido2='$c'";
$result=$conn->query($sql5);
if($d=="borrar"){
    $sql6 = "DELETE FROM clientes WHERE nombre='$a' AND apellido1='$b' AND apellido2='$c' LIMIT 1";
    $conn->query($sql6);
    echo "<div id='clienteBorrado'>";
    echo "<p>Cliente borrado correctamente</p>";
    echo "<form action=modificar.php method='POST'>";
    echo "<input type='hidden' name='nombre' value='$e'>";
    echo " <input type='submit' class='submit' value='Volver'></button>";
    echo "</form>";
    echo "</div>";
}
else if($d=="modificar"){

    echo "<form method='POST' action='modificacion.php'class='formulario'> ";
    echo "<input type='hidden' name='accion' value='modificar'>";
    echo "<input type='hidden' name='nombre' value='$e'>";
    echo "<input type='hidden' name='nombre2' value='$a'>";
    echo "<input type='hidden' name='apellido1' value='$b'>";
    echo "<input type='hidden' name='apellido2' value='$c'>";
    echo "<label>Nombre:</label><input type='text' name='nombre3' require><br>";
    echo "<label>Apellido1:</label><input type='text' name='apellido3'><br>";
    echo "<label>Apellido2:</label><input type='text' name='apellido4'><br>";
    echo "<label>Dirección:</label><input type='text' name='direccion2'><br>";
    echo "<label>Teléfono:</label><input type='text' name='telefono2'><br>";
    echo "<button type='submit'>Guardar Cambios</button>";
    echo "</form>";
}
else if($d=="agregar"){
    echo "<form method='POST' action='agregar.php'class='formulario'> ";
    echo "<input type='hidden' name='nombre' value='$e'>";
    echo "<label>Nombre:</label><input type='text' name='nombre3' require><br>";
    echo "<label>Apellido1:</label><input type='text' name='apellido3'><br>";
    echo "<label>Apellido2:</label><input type='text' name='apellido4'><br>";
    echo "<label>Dirección:</label><input type='text' name='direccion2'><br>";
    echo "<label>Teléfono:</label><input type='text' name='telefono2'><br>";
    echo "<button type='submit'>Guardar Cambios</button>";
    echo "</form>";
}
