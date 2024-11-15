<link rel="stylesheet" href="css.css">
<?php
$a=$_POST["nombre"];
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
#Insertamos los datos
$sql5 ="SELECT * FROM clientes";
$result=$conn->query($sql5);
echo "<nav id='menu'>";
echo "<a href='index.html'><img src='home.png'></a><h1 class='gestor'>Pagina gestor clientes</h1><p class='usuario'>$a</p>";
echo "</nav>";
echo "<div id='tarjetas'>";    
while($row = mysqli_fetch_assoc($result)) { 
      echo "<div class='tarjeta'>";
      echo "<img src='usuario.png' class='imagen'>";
      echo "<p class='nombre'>".$row['nombre']."</p>";
      echo "<p class='apellidos'>".$row['apellido1']."<br>".$row['apellido2']."</p>";
      echo "<p class='direccion'>C:\SJ123 2023</p>";
      echo "<p class='telefono'>986138123</p>";
      echo "<form action='acciones.php' method='POST' class='borrar'>";
      echo "<input type='hidden' name='usuario' value='$a'>";
      echo "<input type='hidden' name='nombre' value='".$row['nombre']."'>";
      echo "<input type='hidden' name='apellido1' value='".$row['apellido1']."'>";
      echo "<input type='hidden' name='apellido2' value='".$row['apellido2']."'>";
      echo "<button class='borrar2' name='accion' value='borrar'>Borrar</button>";
      echo "</form>";
      echo "<form action='acciones.php' method='POST'class='modificar2'>";
      echo "<input type='hidden' name='usuario' value='$a'>";
      echo "<input type='hidden' name='nombre' value='".$row['nombre']."'>";
      echo "<input type='hidden' name='apellido1' value='".$row['apellido1']."'>";
      echo "<input type='hidden' name='apellido2' value='".$row['apellido2']."'>";
      echo "<button class='modificar3'  name='accion' value='modificar'>Modificar</button>";
      echo "</form>";
      echo "</div>";
    }
    echo "<div class='agregar'>";
    echo "<form action='acciones.php' method='POST'>";
    echo "<input type='hidden' name='usuario' value='$a'>";
    echo "<input type='hidden' name='nombre' value='1'>";
    echo "<input type='hidden' name='apellido1' value='1'>";
    echo "<input type='hidden' name='apellido2' value='1'>";
    echo "<button class='agregarNuevo' name='accion' value='agregar'><h1>Agregar nuevo cliente</h1></button";
  echo "</div>";
$conn->close();
?>