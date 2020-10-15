<?php
$conn = mysqli_connect("localhost", "root", "", "pfa");
$email = $_POST['email'];
$objet = $_POST['objet'];
$demande = $_POST['demande'];

    $sql = "INSERT INTO reclamation(email,objet,demande) VALUES ('" . $email. "','" . $objet . "','" . $demande . "')";
     $result = mysqli_query($conn, $sql);

header('Location: contact.html');
    ?>