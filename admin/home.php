<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/highcharts.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/modules/series-label.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/modules/exporting.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/modules/export-data.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/highcharts.js"></script>
    <script src="vendor/Highcharts-6.1.0/code/modules/wordcloud.js"></script>
   <style type="text/css">
       #container3 {
           min-width: 310px;

           margin: 0 auto
       }
     #ilogout{
      margin-right: 20px;
      width: 50px;
      height: 20px;
      color: white;
     }
 </style>
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top" color="white";>
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="az"­ href="home.html">
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
                     <li> </li>
                     <li></li>
                    <li class="active-link">
                        <a href="home.html" ><i class="fa fa-home"></i></i>Page d'accueil</a>
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
        <div id="page-wrapper" >
            <div id="page-inner" >
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMINISTRATEUR</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row" >
                    <div class="col-lg-12 ">
                        <div class="alert alert-info" >
                             <center><strong><h4> BIENVENUE TU ES SUR LA PAGE D'ADMINISTRATEUR </h4></strong></center>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div id="container3"></div>
                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
        die("OOPs something went wrong");
    }
$stmt=$conn->prepare("SELECT type,COUNT(type) as nb FROM postulation GROUP BY type;");
$stmt->execute();
$json=[];
$json2=[];
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $json[]=$nb;
    $json2[]=$type;
}
?>
<center><h2></h2></center>
<canvas id="myChart" width="400" height="120" aria-label="Hello ARIA World" role="img"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($json2);?>,
        datasets: [{
            label: 'nombre de demande',

            backgroundColor:  ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            borderColor: 'white',

            data: <?php echo json_encode($json);?>,
             borderWidth: 1
        }]
    },

    // Configuration options go here
    options: {
  title: {
        display: true,
        text: 'les types des stages les plus demandés de postulations des internautes'
      }
        
    }

});
</script>

                        </div>
                        <div class="col-lg-6">
                            <div id="container"></div>
                            <script src="homeJs/dashboardCharts.js"></script>
                        </div>
                        <div class="col-lg-6">
                            <div id="container2"></div>
                            <script src="homeJs/dashboardCharts2.js"></script>
                        </div>

                        </div>
                </div>
                  <!-- /. ROW  --> 



</div> 






    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
