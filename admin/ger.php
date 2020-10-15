<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Simple Administrateur</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <style type="text/css">
        #ilogout {
            margin-right: 20px;
            width: 50px;
            height: 20px;
            color: white;
        }

        #customers {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 15px; /* Increase font-size */
        }

        #customers th, #customers td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #customers tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #customers tr.header, #customers tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #F1f1f1;
        }
    </style>
</head>
<body>


<?php
require 'connection_bd.php';
?>


<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="az" ­ href="home.html">
                    <img src="assets/admin.png" width="100" height="100"/>

                </a>

            </div>
            <a href="index.php" class="logout-spn"><i id="ilogout" class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
        </div>
    </div>


    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="home.php"><i class="fa fa-home"></i></i>Page d'accueil</a>
                </li>
                <li>
                    <a href="cons_rec.php"><i class="fa fa-comment-o"></i>Les réclamations</a>
                </li>
                  <li>
                    <a href="ger.php"><i class="fa fa-users"></i>Les postulations</a>
                </li>
            
            
            </ul>
        </div>

    </nav>


    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div class="panel">
            <div class="panel-heading">
                <center>
                    <h1><i class="fa fa-users"></i> </i><b>Les postulations des internautes</b></h1>
                </center>
            </div>


                <table id='customers' class="table table-bordered  table-hover">
                    <thead>

                        <tr class="header">
                         



                            
                            <th ><center>nom</center></th>
                            <th ><center>prenom</center></th>
                            <th ><center>type de STAGE</center></th>
                            <th ><center>compétences</center></th>
                            <th ><center>lien de LINKIDIN</center></th>

                           
                          
                             <!--
                             <th></th>
                             <th></th>
                         -->
                            </tr>
                    </thead>
                    <tbody>
                        <?php
require "connection_bd.php";
$resultat=mysqli_query($db, "SELECT * FROM `postulation`");
while ($ligne=mysqli_fetch_array($resultat)) {
    ?>
                            <tr>




                               
                                <td>
                                    <?php echo $ligne['nom']; ?>
                                </td>
                                 <td>
                                    <?php echo $ligne['prenom']; ?>
                                </td>
                                 <td>
                                    <?php echo $ligne['type']; ?>
                                </td>
                                     <td>
                                    <?php echo $ligne['com']; ?>
                                </td>
                                    <td>
                                    <?php echo $ligne['lien']; ?>
                                </td>
                                 <td class="text-capitalize">
                            <a id="<?php echo $ligne['id'] ?>" class="se" data-toggle="modal" data-target="#supp"
                               class="text-danger"><img src="./images/trash.png"></a>
                        </td>

</tr>
                            

        <?php  } ?>   

<div class="modal fade" id="supp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">attention</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 Êtes-vous sure de vouloir supprimer cette postulation?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger confirmer">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>

                    </tbody>
                </table>
        </div>
                <br />
            <!-- Modal -->


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    <script type="text/javascript">
   


</script>
 <script type="text/javascript">
        $(".se").on("click", function (e) {
            //e.preventDefault();
            id1 = $(this).attr("id");
        });

        $(".confirmer").on("click", function (e) {
            //e.preventDefault();
            var url = "supp.php?id=" + id1;
            $(location).attr('href', url);
        });

    </script>
</body>
</html>