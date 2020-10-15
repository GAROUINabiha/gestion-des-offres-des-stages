<?php
require "connection_bd.php";
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM postulation WHERE id=$id;");
header("Location: ger.php", 301);
?>