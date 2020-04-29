<?php

$host = "localhost";
$user = "root";
$pass = "";
$base = "usuarios_test";

$correo=$_POST['correo'];
$clave=$_POST['clave'];

$validar=false;


$con = @mysqli_connect($host, $user, $pass, $base);       
$sql = "SELECT tu.`ID`, `CORREO`, `CLAVE`, `NOMBRE`, `PERFIL`, tp.DESCRIPCION FROM `usuarios` tu"
       ." inner join perfiles tp on tp.ID=tu.PERFIL"
       ." WHERE 1";
$rs = $con->query($sql);



while ($row = $rs->fetch_object())
{
        $correoAux= $row->CORREO;
        $claveAux= $row->CLAVE;
        if($correoAux==$correo && $claveAux==$clave)
        {
            $nombre=$row->NOMBRE;
            $descripcion=$row->DESCRIPCION;
            $validar=true;
            break;
        }
        
}

if($validar)
{
    echo "Nombre: ".$nombre." Perfil: ".$descripcion;
}
else
{
    echo "Ese usuario no existe";
}
      


mysqli_close($con);
        
