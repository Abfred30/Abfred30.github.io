    

<!doctype html>
 <html lang="es">
 
 <head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="csslogin.css">
 <title>Login</title>
 </head>
 
 <body>

    <div class="login-box">

 <form action="validar.php" method="post">
 <h1>Login</h1>
 <div class="textbox">
 <img src="../assets/mail.svg" alt="mail"><input type="text" placeholder="  Usuario" name = "usuario" required>
 </div>

 <div class="textbox"> 
    <img src="../assets/pass.svg" alt="pass"><input type="password" placeholder="  Contraseña" name = "contraseña" required> 
</div>

 <button type="submit" name="btniniciar" class="btn">Iniciar Sesión</button>

 </form>

 <p>¿No tienes una cuenta?
    <a href='registrar.php' class="res">Registrate </a>
   </p>
    </div>
 
 </body>
 </html>