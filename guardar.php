<?php
require_once 'conn.php';
function msg(){
echo "<center>Aun no existe registros</center>";
}
$url = 
"https://docs.google.com/forms/d/1_wgS2jiYVASVtFZ4cXs_2RtXFUQY9_Ag4Mvtabe
bAtQ/formResponse?";
$consulta = "SELECT DISTINCT p.DNI, a.FechaHoraEntrada from
asistencia a 
inner join personas p on p.idEmpleado = a.idEmpleado
order by a.FechaHoraEntrada desc";
$eDNI = "&entry.1698876722=";
$eFecha = "&entry.2021260589=";
$sql = $con->query($consulta);
$datos = array();
if (mysqli_num_rows(mysqli_query($con, $consulta)) == 0){
msg();
}
else{
while ($fila=mysqli_fetch_assoc($sql)) {
$datos[]=$fila;
}
echo json_encode($datos);
}
$con->close();
?>