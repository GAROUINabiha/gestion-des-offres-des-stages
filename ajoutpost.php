<?php
$conn = mysqli_connect("localhost", "root", "", "pfa");
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $type = $_POST['type'];
    $com = $_POST['com'];
    $lien = $_POST['lien'];
   
    $q =  "INSERT INTO `postulation` (`id`, `nom`, `prenom`, `type`, `com`, `lien`) VALUES (NULL,'" . $nom. "','" . $prenom . "','" . $type. "','" . $com . "','" . $lien . "')";
       $result = mysqli_query($conn, $q);

  header("Location: gg.php", true, 301);

?>