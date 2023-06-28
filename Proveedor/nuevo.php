<?php session_start();
 $usuario = $_SESSION['username'];

if(!isset($usuario)){
  header("location: ../login/login.php");
}else {
}

?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssnew.css">
    <link rel="icon" href="../assets/gpung.png">
    <title>Nuevo Proveedor</title>
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

    <div class="table">
    <form action="" method="POST" class="nuevo-proveedor">
        <h2>Ingresar Datos:</h2>
        <table class="content-table">
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" required autocomplete="off"></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><input type="text" name="apellido" required autocomplete="off"></td>
            </tr>
            <tr>
                <td>Teléfono:</td>
                <td><input type="text" name="telefono" pattern="[0-9]{4}-[0-9]{4}" required autocomplete="off"></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><input type="text" name="direccion" required autocomplete="off"></td>
            </tr>
        </table>
                <button name="submit" class="btn">Guardar</button>
    </form>

    </div>
</body>
</html>



<?php
				include ("conexion.php");
				$proveedor= new Database();
				if(isset($_POST["submit"])){
					
                    $nombre = trim($proveedor->sanitize($_POST['nombre']));
                    $apellido = trim($proveedor->sanitize($_POST['apellido']));
                    $telefono = $proveedor->sanitize($_POST['telefono']);
                    $direccion = $proveedor->sanitize($_POST['direccion']);
					
                    try {
					$rta = $proveedor->create($nombre, $apellido, $telefono, $direccion);
					if($rta){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
                        header("Location: proveedor.php");
					}else{
						$message="No se pudieron insertar los datos";
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