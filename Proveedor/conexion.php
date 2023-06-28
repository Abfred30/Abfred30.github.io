<?php

    class Database {
    private $conexion;
    private $host = "127.0.0.1";
    private $user = "miusuario1";
    private $clave = "proyecto";
    private $bd = "proyectobd";


    function __construct()
    {
        $this->connect_db();
    }

    public function connect_db(){

    $this->conexion = mysqli_connect($this->host,$this->user,$this->clave,$this->bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($this->conexion,$this->bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($this->conexion,"utf8");
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->conexion, $var);
        return $return;
      }

    public function create($nombre,$apellido,$telefono,$direccion){
        $sql = "INSERT INTO proveedor (Id_Proveedor, Nombre, Apellido, Telefono, Direccion) VALUES('NULL', '$nombre', '$apellido', '$telefono', '$direccion')";
        $rta = mysqli_query($this->conexion, $sql);
        if($rta){
          return true;
        }else{
        return false;
     }
    }

    public function read(){
        $sql = "SELECT * FROM proveedor order by Apellido asc";
        $rta = mysqli_query($this->conexion, $sql);
        return $rta;
        }

		public function update($nombre,$apellido,$telefono,$direccion, $id){
            $sql = "UPDATE proveedor set Nombre='$nombre', Apellido='$apellido', Telefono='$telefono', Direccion='$direccion' WHERE Id_Proveedor = '$id'";
            $rta = mysqli_query($this->conexion, $sql);
			if($rta){
				return true;
			}else{
				return false;
			}
		}

        public function delete($id){
            $sql = "DELETE FROM proveedor WHERE Id_Proveedor = '$id'";
            $rta = mysqli_query($this->conexion, $sql);
            if($rta){
            return true;
            }else{
            return false;
            }
            }

            public function find($buscar){
            $sql = "SELECT * FROM proveedor WHERE Nombre like '$buscar' '%' or Apellido like '$buscar' '%' order by Apellido asc";
            $rta = mysqli_query($this->conexion, $sql);
            return $rta;
            }

}
?>