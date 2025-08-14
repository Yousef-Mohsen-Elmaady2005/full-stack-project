<?php


include"CONECT.php";

$id_pro=$_GET['id'];

$delete="DELETE FROM products WHERE id='$id_pro'";

$conn->query($delete);

header("location:../prodact.PHP");

?>