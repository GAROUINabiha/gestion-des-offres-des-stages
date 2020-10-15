<?php
function miseEnAttente()
{
 //Traitement
 setTimeout(fonctionAExecuter, 5000); //On attend 5 secondes avant d'exécuter la fonction
}
function fonctionAExecuter()
{
 $conn = mysqli_connect("localhost", "root", "", "pfa");
 $sql = "TRUNCATE `pfa`.`stage`";
 $result = mysqli_query($conn, $sql);
}
?>