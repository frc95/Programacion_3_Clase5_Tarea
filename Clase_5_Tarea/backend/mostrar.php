<?php

$host = "localhost";
$user = "root";
$pass = "";
$base = "usuarios_test";




$con = @mysqli_connect($host, $user, $pass, $base);       
$sql = "SELECT tu.`ID`, `CORREO`, `CLAVE`, `NOMBRE`, `PERFIL`, tp.DESCRIPCION FROM `usuarios` tu"
       ." inner join perfiles tp on tp.ID=tu.PERFIL"
       ." WHERE 1";
$rs = $con->query($sql);



while ($row = $rs->fetch_object())
{
    $user_arr[] = $row;  
        
}

var_dump($user_arr);
      


mysqli_close($con);