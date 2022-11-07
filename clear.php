<?php
require_once 'conn.php';
$consulta = "DELETE FROM asistencia";
$con->query($consulta);
$con->close();
?>
