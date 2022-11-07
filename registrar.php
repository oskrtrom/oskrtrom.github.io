<?php
require_once 'conn.php';
function msg(){
echo "error";
}
$DNI = $_POST['dni'];
$btn = $_POST['btn'];
if (validateDNI($DNI, $con) == TRUE){
if ($btn == "btnBuscar"){
setInfo($DNI, $con);
}
else{
setRegistro($DNI, $con);
}
} 
function setInfo($DNI, $con){
$sql = " SELECT Nombre, Apellido, DNI, Celular, Correo, 
FechaHoraEntrada
FROM personas p 
INNER JOIN asistencia a on p.idEmpleado = a.idEmpleado 
where DNI='$DNI' order by idAsistencia DESC LIMIT 1";
$rs = mysqli_query($con, $sql );
if (mysqli_num_rows(mysqli_query($con, $sql)) == 0){
msg();
}
else{
$c = 0;
$csv='';
$ro = mysqli_query($con, "SHOW COLUMNS FROM personas");
$f = mysqli_num_rows($ro);
while ($row = mysqli_fetch_row($rs)) {
for ($j=0;$j<$f;$j++) {
$csv .= $row[$j].", ";
}
}
print $csv;
}
}
function validateDNI($DNI, $con){
$sql = "SELECT * FROM personas WHERE DNI='$DNI'";
$hacer = $con->query($sql);
if (mysqli_num_rows(mysqli_query($con, $sql)) == 0){
msg();
}
else{
return true;
}
}
function setRegistro($DNI, $con){
$sql = " INSERT INTO asistencia(idAsistencia, idEmpleado, 
FechaHoraEntrada)
VALUES(NULL, (select idEmpleado from personas where
DNI='$DNI'), NOW())";
if($rs = mysqli_query($con, $sql )==False){
echo "Ocurrio un Error";
}
else{
setInfo($DNI, $con);
}
}
$con->close();
?>