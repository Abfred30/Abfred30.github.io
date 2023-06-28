<?php

include "conexion.php";
error_reporting(0);
session_start();




if(isset($_SESSION['username']))
{
    header("Location: home1.php");
}

if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $password= password_hash($_POST["password"],PASSWORD_DEFAULT);
    
    
    
        $sql="SELECT * FROM usuarios WHERE correo='$email'";
        $result= mysqli_query($conexion, $sql);
        if(!$result->num_rows > 0){
            
            $sql="INSERT INTO usuarios (Id_Usuario,correo,nombre,apellido,contraseña)
            VALUE ('NULL','$email', '$nombre','$apellido', '$password')";
            $result=mysqli_query($conexion,$sql);
            
            if($result){
                echo "<script>alert('Usuario registrado con éxito')</script>";
                $email="";
                $nombre="";
                $apellido="";
                $_POST["password"]="";
                $_POST["cpassword"]="";
                
            }else{
                echo "<script>alert('Hay un error')</script>";
            }
            
            
        }else{
            echo "<script>alert('El correo ya existe')</script>";
        }
    
}

?>


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssregis.css">
    <link rel="icon" href="../assets/gpung.png">
	<title>registro</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <h1>Registro</h1>
			<div class="input-group">
				<img src="../assets/mail.svg" alt="mail"><input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" autocomplete="off" required>
			</div>
            <div class="input-group">
				<img src="../assets/perwhite.svg" alt="name"><input type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>" autocomplete="off" required>
			</div>
            <div class="input-group">
                <img src="../assets/persinwhirte.svg" alt="lastname"><input type="text" placeholder="Apellido" name="apellido" value="<?php echo $apellido; ?>" autocomplete="off" required>
			</div>
			<div class="input-group">
				<img src="../assets/pass.svg" alt="pass0"><input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" autocomplete="off" required>
            </div>
            <div>
                <button name="submit" class="btn">Registrarme</button>
            </div>
				

            <a href='login.php' class="log">Login </a>
			</div>
            
			
		</form>
	</div>
</body>
</html>