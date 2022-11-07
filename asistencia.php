<?php
require_once 'conn.php';
function msg(){
echo "<center>Aun no existe registros</center>";
}
$consulta = "SELECT p.Nombre, p.Apellido, p.DNI, p.Celular, p.Correo, 
a.FechaHoraEntrada
FROM asistencia a 
INNER JOIN personas p on p.idEmpleado =
a.idEmpleado";
$sql = $con->query($consulta);
if (mysqli_num_rows(mysqli_query($con, $consulta)) == 0){
msg();
}
else{
showAsistencia($sql,$con);
}
function showAsistencia($sql,$con){
echo "<center><table border='1' cellpadding='4' 
cellspacing='0'>";
echo
"<tr>
<td><b>Asistencia</b></td>
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>DNI</b></td>
<td><b>Celular</b></td>
<td><b>Correo</b></td>
</tr>";
while ($rowr = $sql->fetch_assoc()) {
echo
"<tr>
<td>".$rowr["FechaHoraEntrada"]."</td>
<td>".$rowr["Nombre"]."</td>
<td>".$rowr["Apellido"]."</td>
<td>".$rowr["DNI"]."</td>
<td>".$rowr["Celular"]."</td>
<td>".$rowr["Correo"]."</td>
</tr>";
}
echo "</table></center>";
}
$con->close();
?>
CLEAR.P