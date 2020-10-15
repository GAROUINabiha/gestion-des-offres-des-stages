<?php
 $conn = mysqli_connect("localhost", "root", "", "pfa");
 $sql = "TRUNCATE `pfa`.`stage`";     
 $result = mysqli_query($conn, $sql);
?>