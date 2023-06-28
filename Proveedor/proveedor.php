  

<?php

 session_start();
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
    <link rel="stylesheet" href="styleprovee.css">
    <link rel="icon" href="../assets/gpung.png">
    <title>Proveedores</title>
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
        <h2>Tabla de Proveedores</h2>

        <div class="buscar">
            <form action="buscar.php" method="POST">
            <input type="text" name="buscar" placeholder="buscar Proveedor..." required autocomplete="off">
            <input type="submit" value="Buscar">
            <a href="nuevo.php" >Añadir Proveedor</a>
            </form>
        </div>

        <table class="content-table">
        <thead>
        <tr>
            <td>Id_Proveedor</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Telefono</td>
            <td>Direccion</td>
            <td>Opciones</td>
        </tr>
        </thead>
        <tbody>
        <?php
            include ('conexion.php');
            $proveedor = new Database();
			$listado=$proveedor->read();
            
            while ($mostrar = mysqli_fetch_row($listado)) {
                ?>

                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td>
                            <a href="editar.php?
                            Id=<?php echo $mostrar[0] ?> &
                            Nombre=<?php echo $mostrar[1] ?> &
                            Apellido=<?php echo $mostrar[2] ?> &
                            Telefono=<?php echo $mostrar[3] ?> &
                            Direccion=<?php echo $mostrar[4] ?> 
                            ">Editar</a>
                            <a href="eliminar.php? Id=<?php echo $mostrar[0] ?>"onclick="return confirm('¿Estas seguro?');">Eliminar</a>
                        </td>
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