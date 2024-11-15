<link rel="stylesheet" href="css.css">
<?php
$a=$_POST["nombre"];
$b=$_POST["contraseña"];
#Hacer una pàgina php base de datos  donde hay un login para que solo los usuarios autorizados puedan: ver una lista de clientes, imagen del cliente , datos del cliente etc... boton para el usuario pueda añadir un nuevo cliente,modificar y borrar
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$sql = "CREATE DATABASE IF NOT EXISTS pruebaAgenda";
$conn->query($sql);
$sql3=mysqli_select_db( $conn, 'pruebaAgenda' );
$sql4 = "CREATE TABLE IF NOT EXISTS usuarios (
    nombre VARCHAR(30) , 
    contraseña VARCHaR(30) 
    )";
$conn->query($sql4);
#Insertamos los datos
$sql5 ="SELECT * FROM usuarios";
$result=$conn->query($sql5);
if(mysqli_num_rows($result)==0){
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Pedro','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Antonio','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Manuel','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Juan','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Jorge','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Gabriel','Abc123.')";
  $conn->query($sql6);
  $sql6 = "INSERT INTO usuarios(nombre,contraseña) VALUES ('Gonzalo','Abc123.')";
  $conn->query($sql6);
}
$usuario=false;
$contraseña=false;
while($row = mysqli_fetch_assoc($result)) {
  if($usuario==false){
    if($row["nombre"]==$a && $row["contraseña"]==$b){
      $usuario=true;
      $contraseña=true;
    }
  }
}
if($usuario==true && $contraseña==true){
  $sql4 = "CREATE TABLE IF NOT EXISTS clientes (
    nombre VARCHAR(30) , 
    apellido1 VARCHAR(30),
    apellido2 VARCHAR(30),
    direccion VARCHAR(30),
    telefono INT(9) 
    )";
    $conn->query($sql4);
$sql7="SELECT * FROM clientes";
$result=$conn->query($sql7);
if(mysqli_num_rows($result)==0){
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Gabriel','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Luis','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Gonzalo','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Pedro','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Arthur','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Marcos','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
  $sql6 = "INSERT INTO clientes(nombre,apellido1,apellido2,direccion,telefono) VALUES ('Daniel','Gomez','Fernandez','Rua 12',987654321)";
  $conn->query($sql6);
}
$result=$conn->query($sql7);
#Si seleccionamos algun resultado que se muestre 
echo "<nav id='menu'>";
echo "<a href='index.html'><img src='home.png'></a><h1 class='gestor'>Pagina gestor clientes</h1><p class='usuario'>$a</p>";
echo "</nav>";
if ($contraseña==true) {
  echo "<form action='listar.php' method='post'>";
    echo "<div id='botones'>";
    echo "<h1>¿Que deseas realizar?</h1>";
    echo "<button class='listar' name='nombre' value='$a'>Listar clientes</button><br>";
    echo "</form>";
    echo "<form action='modificar.php' method='post'>";
    echo "<button class='modificar' name='nombre' value='$a'>Modificar clientes</button>";
    echo "</div>";
    echo "</form>";
  }
}
if($contraseña==false){
  echo "<div id='opciones'>";
  echo "<p>Usuario o contraseña incorrecto</p>";
  echo " <a href='./index.html' class='enlace'><input type='submit' class='submit' value='Volver'></button></a>";
  echo "</div>";
}

$conn->close();
?>