<?php
// Conexión a la base de datos
include("./conexion.php");
$idsensor = $_POST['idsensor'];
// Consulta a la base de datos
//$sql = "SELECT * FROM datoscircuito WHERE fecha = (SELECT MAX(fecha) FROM datoscircuito)";
$sql = "SELECT * FROM lecturas WHERE fecha = (SELECT MAX(fecha) FROM lecturas) AND id_Sensor = '$idsensor';";
$res = $mysqli->query($sql);
$tot_registros = mysqli_num_rows($res);
// Crear array con los datos
$data = array();
if ($tot_registros > 0) {
  while($row = $res->fetch_assoc()) {
    $data[] = $row;
  }
}
// Enviar los datos en formato JSON
echo json_encode($data);
// Cerrar la conexión a la base de datos
?>
