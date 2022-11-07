<?php
error_reporting ( E_ALL ^ E_NOTICE ^ E_DEPRECATED );
$db_host="localhost";
$db_name="db";
$db_login="root";
$db_pswd="";
$con= new mysqli($db_host, $db_login, $db_pswd,$db_name);
if ($con->connect_errno) {
echo "Lo sentimos, este sitio web está experimentando problemas 
de
conexion a la Base de Datos.";
exit;
}
?>