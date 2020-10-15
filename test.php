 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/rech.png" type="images/png">
  <title>STAGE.tn</title>  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
   <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




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
       body
       {
    display:inline;
       }
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
input[type=text] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
button 
   {
  width: 2%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

 </style>
</head>
<body>

<?php
require 'cnx.php';
?>        
 




      
        <div class="panel-heading">
            <center><h1><b>  Liste des offres des stages disponibles </b></h1></center>

        </div>

  <div><center>

        <div class="inner-form">

              <form method="POST" action="select.php">
      <input type="text" placeholder="Tapez un mot clé" name="title"> <button type="submit"><i class="fa fa-search"></i></button>
</form>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <form method="POST" action="local.php">
      <input type="text" placeholder="Tapez localistation" name="local"> <button type="submit"><i class="fa fa-search"></i></button>
            </form>

</div>
</center>

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

$resultat=mysqli_query($db, "select * from stage;");
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