<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
   
    </head>
  
    <body>
<?php
$db = new mysqli("localhost", "root", "", "beaute");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}

     
   $email = $_REQUEST['email']; //information from login form
  $password = $_REQUEST['password']; //information from login form
  $sql = "SELECT email,password FROM client WHERE email='$email' AND password='$password'";
  $result = mysqli_query($db,$sql);
  $login_variables = mysqli_fetch_array($result);
  $_SESSION['sess_email'] = $login_variables['email'];
  $_SESSION['sess_password'] = $login_variables['password'];

  if(isset($_SESSION['sess_email']) && isset($_SESSION['sess_password']))
  {
    echo "success";;
  } 
  else
  {

echo "failed";

}
        ?>
  
    </body>