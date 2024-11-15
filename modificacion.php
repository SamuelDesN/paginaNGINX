<link rel="stylesheet" href="css.css">
<?php
$a=$_POST["nombre2"];
$b=$_POST["apellido1"];
$c=$_POST["apellido2"];
$d=$_POST["accion"];
$e=$_POST["nombre"];
$f=$_POST["nombre3"];
$g=$_POST["apellido3"];
$h=$_POST["apellido4"];
$i=$_POST["direccion2"];
$o=$_POST["telefono2"];
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
    $sql6 = "UPDATE clientes SET nombre = '$f', apellido1 ='$g', apellido2 = '$h', direccion = '$i', telefono ='$o'  WHERE nombre='$a' AND apellido1='$b' AND apellido2='$c'";
    $conn->query($sql6);
    echo "<div id='clienteBorrado'>";
    echo "<p>Cliente modificado correctamente</p>";
    echo "<form action=modificar.php method='POST'>";
    echo "<input type='hidden' name='nombre' value='$e'>";
    echo " <input type='submit' class='submit' value='Volver'></button>";
    echo "</form>";
    echo "</div>";
    ?>