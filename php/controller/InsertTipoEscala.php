<?php 
require_once("../inc/coneccao.php");
$id = isset($_POST["id"]) ? $_POST["id"] : FALSE;
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : FALSE;
$jornada = isset($_POST["jornada"]) ? $_POST["jornada"] : FALSE;
$qtd = isset($_POST["qtd"]) ? $_POST["qtd"] : FALSE;



?>