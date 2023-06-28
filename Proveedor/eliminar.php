<?php
 
include('conexion.php');
$proveedor = new Database();
$id = $_GET['Id'];


try {

    $rta = $proveedor->delete($id);
	if($rta){
        header("Location: proveedor.php");
	}else{
		echo "Ha ocurrido un error, No puede eliminar este registro";
        echo "<a href='proveedor.php'> Volver </a>";
	}

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n"; 
} 


?>