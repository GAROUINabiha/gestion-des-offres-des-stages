<?php
$db = new mysqli("localhost", "root", "", "pfa");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}
