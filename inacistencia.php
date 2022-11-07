<?php
require_once 'conn.php';
function msg(){
echo "error";
}
$sql = $con->query("SELECT DISTINCT * from personas
where idEmpleado not in(select idEmpleado from
asistencia)");
showInasistencia($sql, $con);
function showInasistencia($sql,$con){
echo "<center><table border='1' cellpadding='4' 
cellspacing='0'>";
echo
"<tr>
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>DNI</b></td>
<td><b>Celular</b></td>
<td><b>Correo</b></td>
</tr>";
while ($rowr = $sql->fetch_assoc()) {
echo
"<tr>
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
