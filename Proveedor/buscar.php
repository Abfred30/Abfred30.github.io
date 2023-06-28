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
    <link rel="stylesheet" href="cssbuscar.css">
    <link rel="icon" href="../assets/gpung.png">
    <title>Buscar Proveedor</title>
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
    <h2>Buscar</h2>
    <div class="buscar">
        <form action="buscar.php" method="post">
            <input type="text" name="buscar" placeholder="buscar..." required autocomplete="off">
            <input type="submit" value="Buscar">
            <a href="nuevo.php">Añadir Nuevo</a>
        </form>
    </div>
        <table class="content-table">
            <thead>
            <tr>
            <td>Nombre</td>
                <td>Apellido</td>
				<td>Teléfono</td>
				<td>Dirección</td>
				<td>Opciones</td>
            </tr>
            </thead>
            <tbody>
            <?php
			   
                include ('conexion.php');
                $buscar = $_POST['buscar'];
                $proveedor = new Database();
			    $listado=$proveedor->find($buscar);

                while ($mostrar = mysqli_fetch_row($listado)) {
                    ?>
                    <tr>
                        
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
</body>
</html>