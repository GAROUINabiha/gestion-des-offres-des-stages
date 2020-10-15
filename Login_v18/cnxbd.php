
<?php
$db = new mysqli("localhost", "root", "", "beaute");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}
