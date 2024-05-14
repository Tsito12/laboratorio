<?php
session_start();
require_once "Modelo/Conexion.php";
$abr = new Conexion("localhost","laboratorio",$_SESSION['user'],$_SESSION['pass']);
var_dump($abr->getCon());
?>