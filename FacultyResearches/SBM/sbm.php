<?php 
// session_start();
include '../../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RETWVSU-PC</title>
  <!-- Bootstrap -->
  <link href="bootstrap-4.4.1.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div class="container-fluid">
   <div class="container">
     <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="../../index.php"><img src="../../images/retfinal.png" width="200" height="70" alt=""/></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent1">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active"> <a class="nav-link" href="../../index.php">HOME <span class="sr-only">(current)</span></a> </li>
           <li class="nav-item"> <a class="nav-link" href="../../extensionprograms.php">EXTENSIONS</a></li>
           <li class="nav-item">
             <div class="dropdown">
              <button type="button" class="border-0 bg-transparent nav-link btn dropdown-toggle" data-toggle="dropdown">
                RESEARCH
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../../studentResearches.php">STUDENT</a>
                <a class="dropdown-item" href="../../facultyResearches.php">FACULTY</a>
              </div>
            </div>
           </li>
           <li class="nav-item"> <a class="nav-link" href="../../newsandupdates.php">NEWS</a></li>
           <li class="nav-item">
            <div class="dropdown">
              <button type="button" class="border-0 bg-transparent nav-link btn dropdown-toggle" data-toggle="dropdown">
                ABOUT US
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../../qualityObjective.php">QUALITY OBJECTIVE</a>
                <a class="dropdown-item" href="../../orgchart.php">ORG CHART</a>
                <a class="dropdown-item" href="../../contact.php">CONTACT US</a>
              </div>
            </div>
          </li>
        </ul>
     </div>
   </nav>

   <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
     <ol class="carousel-indicators">
       <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
       <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
       <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner" role="listbox">
       <div class="carousel-item active"> <img class="d-block mx-auto" src="../../images/1.jpg" alt="First slide">
         <div class="carousel-caption">
           <h5>&nbsp;&nbsp;</h5>
           <p></p>
         </div>
       </div>
       <div class="carousel-item"> <img class="d-block mx-auto" src="../../images/2.jpg" alt="Second slide">
         <div class="carousel-caption">
           <h5></h5>
           <p></p>
         </div>
       </div>
       <div class="carousel-item"> <img class="d-block mx-auto" src="../../images/3.jpg" alt="Third slide">
         <div class="carousel-caption">
           <h5></h5>
           <p></p>
         </div>
       </div>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
     <h1 class="text-center">RESEARCHES 2015-2021&nbsp;</h1>
     <br>
     <h3 class="text-center">SCHOOL OF BUSINESS &amp; MANAGEMENT (SBM)&nbsp; &nbsp;&nbsp;</h3>
    <div class="">
       <form action="sbm.php" method="POST">
        <label>Filter By Year:</label>
        <div class="row px-2">
         <div class="col-2 px-1">
           <select class="form-control" name="searching">
            <option selected="" disabled="">-- Select Year --</option>
            <?php 
            $sel_yr = mysqli_query($connection,"SELECT  DISTINCT yr FROM research WHERE research_category= 2 AND dept='SBM' ") or die(mysqli_error($connection));
            while($reslt = mysqli_fetch_array($sel_yr)){
              ?>
              <option value="<?php echo $reslt['yr'] ?>"><?php echo $reslt['yr'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-1 px-1">
         <button type="submit" name="search" class="btn btn-success">OK</button>  
       </div>
       <div class="col-1 px-1"><button class="btn-primary py-1 rounded">Refresh</button></div>
     </div>
   </form>
 </div><br><br>
 <form action="../../nextpage.php" method="POST">
   <div class="row">
    <?php 
    $sel_sbm = "";
    if(isset($_POST['search'])){
      $searching = $_POST['searching'];
      $sel_sbm = mysqli_query($connection,"SELECT DISTINCT yr,dept,research_category FROM research WHERE dept='SBM' AND research_category = 2 AND yr='$searching'")or die(mysqli_error($connection));
    }else{
      $sel_sbm = mysqli_query($connection,"SELECT DISTINCT yr,dept,research_category FROM research WHERE dept='SBM' AND research_category = 2 ORDER BY yr DESC")or die(mysqli_error($connection));
    }
      while($res = mysqli_fetch_array($sel_sbm)){ 
        ?>
          <input type="hidden" name="dept" value="<?php echo $res['dept'] ?>">
          <input type="hidden" name="category" value="<?php echo $res['research_category'] ?>">
          <div class="col-4 px- py-1 mb-2">
            <div class="bg-light shadow px-2" style="height: 200px; ">
              <h5 class="card-title">RESEARCHES YEAR <?php echo $res['yr'] ?></h5>
            <p class="card-text">This page contains researches oF SBM year <?php echo $res['yr'] ?>.</p>
              <button name="btn" class="btn btn-success" value="<?php echo $res['yr'] ?>">View</button>
            </div>
          </div>
        <?php
      }
      ?>
     </div>
    </form>

    <br>
    <br>
     <footer>
          <div class="row">
            <div class="col-xl-3">&nbsp;<img src="../../images/retfinal.png" width="200" height="80" alt=""/></div>
            <div class="col-xl-5">
      <center>
              <p>RESEARCH, EXTENSION &amp; TRAINING OF WVSU-PC&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
              <p>Copyright © 2021 All Rights Reserved </p>
        </center>
      
            </div>
          </div>
</footer>
</div>
</div>
<!-- body code goes here -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="jquery-3.4.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="popper.min.js"></script> 
<script src="bootstrap-4.4.1.js"></script>
</body>
</html>
