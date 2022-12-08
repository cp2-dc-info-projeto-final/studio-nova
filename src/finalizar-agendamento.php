<?php
include "autentica.php";
include "conecta.php";

$id = $GET["id_agendamento"];

$sql= "SELECT * FROM agendamentos WHERE id = '$id';";
$sql_query = $mysqli->query($sql) or die ("Falha na execusão do código:" . $mysqli->error);


?>