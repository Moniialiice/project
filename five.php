<?php
$ide=$_GET['id'];
$idu=$_GET['idu'];
include('bd.php');
include ('Materia.php');
$user=new Materia();
$user->deleteMateriaMat($ide,$idu);

?>