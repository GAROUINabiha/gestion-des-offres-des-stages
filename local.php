 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/rech.png" type="images/png">
  <title>STAGE.tn</title>  <!-- BOOTSTRAP STYLES-->
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
   <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"/>




   <style type="text/css">
    #ilogout{
      margin-right: 20px;
      width: 50px;
      height: 20px;
      color: white;
     }
       #e {
        color: red;
       }
       #myInput {
    background-image: url('./images/j.png'); /* Add a search icon to input */
    background-position: 9px 10px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 25%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 10px 50px 15px 50px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 20px; /* Add some space below the input */
    height: 50px;
}
#customers{
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 15px; /* Increase font-size */
}

#customers th, #customers td {
    text-align: left; /* Left-align text */
    padding: 10px; /* Add padding */
    padding-right: 50px;
}

#customers tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#customers tr.header, #customers tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color:  #F1f1f1;
}

 </style>
</head>
<body>

<?php
require 'cnx.php';


?>        
 




      
        <div class="panel-heading">
            <center><h1><i class="fa fa-gears"></i> <b>  les résultats de votre recherche</b></h1></center>

        </div>
     


             



        <!--tableau des services les colonnes et les lignes-->
                <table id='customers' class="table table-bordered  table-hover">
                    <thead>

                        <tr class="header">
                         



                            <th >LIEN</th>
                            <th ><center>TYPE STAGE</center></th>
                            <th ><center>ADRESSE</center></th>
                            <th ><center>DESCRIPTION</center></th>
                          
                             <!--
                             <th></th>
                             <th></th>
                         -->
                            </tr>
                    </thead>
                    <tbody>
                        <?php
require "cnx.php";
$local = $_POST['local'];
$resultat=mysqli_query($db, "SELECT * FROM `stage` WHERE local LIKE '%$local%'");
while ($ligne=mysqli_fetch_array($resultat)) {
    ?>
                            <tr>




                                <td>
                           <a href="<?php echo $ligne['lien']; ?>"> <?php echo $ligne['lien']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['title']; ?>
                                </td>
                                 <td>
                                    <?php echo $ligne['local']; ?>
                                </td>
                                     <td>
                                    <?php echo $ligne['content']; ?>
                                </td>

</tr>
                            

        <?php  } ?>   


                    </tbody>
                </table>
        </div>
                <br />
<!-- le button ajouter on peut mettre dans ce champs un form model -->
    
         <!--  

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
    </div>
  </div>
</div>

 -->




  <!-- Modal -->
 




  






</body>
</html>