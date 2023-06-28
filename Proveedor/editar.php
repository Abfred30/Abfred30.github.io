<?php session_start();
 $usuario = $_SESSION['username'];

if(!isset($usuario)){
  header("location: ../login/login.php");
}else {
}

?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="csseditar.css">
    <link rel="icon" href="../assets/gpung.png">
    <title>Document</title>
</head>
<body>

<header class="header">
		<div class="container">
            <nav class="menu">
				<a href="#"><img src="../assets/noti.svg" alt="navnoti"></a>
				<a href="#"><img src="../assets/per.svg" alt="navperson"></a>
				<a href="#"><?php echo($_SESSION['username']); ?></a>
			</nav>
        </div>
</header>
<div class="main">
    <div class="sidebar">
        <h2 class="logo">GPU Starr</h2>
        <a href="/ProyectoFinalS7/login/home1.php">Home</a>
        <a href="/ProyectoFinalS7/Producto/producto.php">Producto</a>
        <a href="/ProyectoFinalS7/Sucursal/sucursal.php">Sucursal</a>
        <a href="/ProyectoFinalS7/Proveedor/proveedor.php">Proveedor</a>
        <a href="/ProyectoFinalS7/fabricante/fabricante.php">Fabricantes</a>
    </div>

<?php
$id = $_GET['Id'];
$nombre = trim($_GET['Nombre']);
$apellido = trim($_GET['Apellido']); 
$telefono = trim($_GET['Telefono']);
$direccion = $_GET['Direccion'];

?>
    <div class="table">
    <form action="" method="POST" class="editar-proveedor">
        <table class="content-table">
        <h2>Ingresar Datos:</h2>
        <thead>
        <tr>
                <td>Editar</td>
                <td><input type="text" name="id" style="visibility: hidden;"  value="<?=$id?>" id=""></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nombre:</td>
                <td><input type="text"  name="nombre" required autocomplete="off" value="<?=$nombre?>" ></td>
                
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="apellido" required autocomplete="off"value="<?=$apellido?>" ></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><input type="text" name="telefono" pattern="[0-9]{4}-[0-9]{4}" required autocomplete="off" value="<?=$telefono?>" ></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><input type="text" name="direccion"required autocomplete="off" value="<?=$direccion?>" ></td>
            </tr>
        </tbody>
        </table>
        </tr>
        
        <button name="submit" class="btn">Actualizar</button>
        <a href="proveedor.php">Cancelar</a>
   
    </form>

    </div>
</body>
</html>

<?php
include ("conexion.php");
$proveedor= new Database();


if(isset($_POST["submit"])){

$id = $_POST['id'];
$nombre = $proveedor->sanitize($_POST['nombre']);
$apellido = $proveedor->sanitize($_POST['apellido']);
$telefono = $proveedor->sanitize($_POST['telefono']);
$direccion = $proveedor->sanitize($_POST['direccion']);
try {
    $rta = $proveedor->update($nombre, $apellido, $telefono, $direccion, $id);
					if($rta){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
                        header("Location: proveedor.php");
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}


} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>
<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>
                <?php

}

?>
