

<?php
date_default_timezone_set("America/Panama");
$fecha = date ("m-d-Y | h:i:s a", time());
setcookie("fecha", $fecha, time() + (30 * 24 * 3600));


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
  <link rel="stylesheet" href="csshome.css">
  <link rel="icon" href="../assets/gpung.png">
  <title>Home</title>
</head>
<body>
<div class="banner">
  <div class="navbar">
    <img src="../assets/gpung.png" class="logo">
    <ul>
      <li><a href="#"><img src="../assets/notiwhite.svg" alt="navnoti"></a></li>
      <li><a href="#"><img src="../assets/perwhite.svg" alt="navperson"></a></li>
      <li><a href="#"><?php echo($_SESSION['username']); ?></a></li>
      <li><a href="salir.php">salir</a></li>
    </ul>
  </div>
</div>

<div class="content">
  <h1>GPU Starr</h1>
  <p>Somos una empresa que se encarga de la venta exclusiva de targetas
    graficas, y las enviamos a todo panama!
  </p>
  
  <div class="btn"> 
  <a href="/ProyectoFinalS7/Producto/producto.php"><span></span>Productos</a>
  <a href="/ProyectoFinalS7/Proveedor/proveedor.php"><span></span>Proveedor</a>
  <a href="/ProyectoFinalS7/Fabricante/fabricante.php"><span></span>Fabricantes</a>
  <a href="/ProyectoFinalS7/Sucursal/sucursal.php"><span></span>Sucursales</a>
  </div>
  </div>

  <footer>
    <div class="footer-content">
      <?php 
      
      if(isset($_COOKIE['fecha'])){
        echo "Su última acceso al sistema fue el ".$_COOKIE['fecha'];
      }else{
        
        echo "¡Bienvenido, una cookie ha sido creada!";
      
      }

      ?>

      <ul class="socials">
        <li><a href="#"><img src="../assets/face.png" alt="face"></a></li>
        <li><a href="#"><img src="../assets/youtube.svg" alt=""></></li>
        <li><a href="#"><img src="../assets/twitter.png" alt=""></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>copyright &copy; 2021 <b>GPU Starr. - Derechos reservados</b></p>
    </div>
  </footer>
</body>


</html>