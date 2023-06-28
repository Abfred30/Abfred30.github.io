<?php
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    

    session_start();
    $_SESSION['usuario'] = $usuario;

    include('conexion.php');
    $consulta1= mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$usuario'");
    $nr = mysqli_num_rows($consulta1);
    $buscarContra = mysqli_fetch_array($consulta1);
    if (($nr == 1) && (password_verify($contraseña,$buscarContra['contraseña']))){

    /*$consulta="SELECT * FROM usuarios where correo = '$usuario'";
    $resultado=mysqli_query($conexion,$consulta);

  

    $filas=mysqli_num_rows($resultado);

    if($filas){  */
        $_SESSION['username'] = $usuario;
        header("location:home1.php");
       
       
    }
    else{
        ?>
        <?php
        include("login.php");
        ?>
        echo "<script>alert('ERROR! Validacion erronea')</script>";
        <?php
    }
    
    mysqli_free_result($consulta1);
    mysqli_close($conexion);


