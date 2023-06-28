<?php session_start();
 $usuario = $_SESSION['username'];

if(!isset($usuario)){
  header("location: ../login/login.php");
}else {
$conexion=mysqli_connect("localhost", "root", "", "proyectobd");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylefa.css">
    <link rel="icon" href="../assets/gpung.png">
    <title>Fabricantes</title>
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
        <a href="/ProyectoFinalS7/login/salir.php">Salir</a>
    </div>

    <div class="table">
        <h2>Tabla de Fabricantes</h2>
    <table class="content-table">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Ubicacion</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="SELECT * from fabricante";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
            
        
        ?>
        <tr>
            <td><?php echo $mostrar['nombre']?></td>
            <td><?php echo $mostrar['Ubicacion']?></td>
      </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>