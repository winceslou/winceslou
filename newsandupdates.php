<?php 
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RETWVSU-PC</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css">
  <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/arbutus:n4:default.js" type="text/javascript"></script>
</head>
<body>
 <div class="container-fluid">
   <div class="container">
     <?php 
     include 'navbar.php';
     ?>
     <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: #EAEAEA; background-image: -webkit-linear-gradient(270deg,rgba(255,153,255,1.00) 0%,rgba(255,153,255,1.00) 13.89%,rgba(255,255,255,1.00) 32.95%,rgba(250,250,250,1.00) 100%); background-image: -moz-linear-gradient(270deg,rgba(255,153,255,1.00) 0%,rgba(255,153,255,1.00) 13.89%,rgba(255,255,255,1.00) 32.95%,rgba(250,250,250,1.00) 100%); background-image: -o-linear-gradient(270deg,rgba(255,153,255,1.00) 0%,rgba(255,153,255,1.00) 13.89%,rgba(255,255,255,1.00) 32.95%,rgba(250,250,250,1.00) 100%); background-image: linear-gradient(180deg,rgba(255,153,255,1.00) 0.00%,rgba(255,153,255,1.00) 13.89%,rgba(255,255,255,1.00) 32.95%,rgba(250,250,250,1.00) 100%);">
       <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner" role="listbox">
         <div class="carousel-item active"> <img class="d-block mx-auto" src="images/1.jpg" alt="First slide">
           <div class="carousel-caption">
             <h5>&nbsp;&nbsp;</h5>
             <p></p>
           </div>
         </div>
         <div class="carousel-item"> <img class="d-block mx-auto" src="images/2.jpg" alt="Second slide">
           <div class="carousel-caption">
             <h5></h5>
             <p></p>
           </div>
         </div>
         <div class="carousel-item"> <img class="d-block mx-auto" src="images/3.jpg" alt="Third slide">
           <div class="carousel-caption">
             <h5></h5>
             <p></p>
           </div>
         </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
       <br>
       <div class="bg-light">
        <h1 class="text-center">NEWS &amp; UPDATES&nbsp;</h1>
        <div class="card-body h5" style="overflow: scroll; height: 400px">
          <?php 
          $sel_newUpdate = mysqli_query($connection,"SELECT * FROM news ORDER BY id DESC") or die (mysqli_error($connection));
          while($row = mysqli_fetch_array($sel_newUpdate)){
            ?>
            <div class="border-bottom border-dark pb-1 pt-2">
              <label><b>Date</b> <?php echo $row['created_at'] ?></label><br>
              <label>News & Updates</label><br><br>
              <?php echo nl2br($row['description']) ?> <br>
            <center>
              <img src="news_update/<?php echo $row['cover_photo'] ?>" width="800" height="400">
            </center>
            </div><br>
            <?php
          }
          ?>
        </div>
        
      </div>
      <br>
      <div class="mt-4 bg-light">
        <h1 class="text-center">ANNOUNCEMENTS</h1>
        <div class="card-body h5" style="overflow: scroll; height: 400px">
          <?php 
          $sel_announce = mysqli_query($connection,"SELECT * FROM announcement ORDER BY id DESC") or die (mysqli_error($connection));
          while($row = mysqli_fetch_array($sel_announce)){
            ?>
            <div class="border-bottom border-dark pb-1 pt-2">
              <label><b>Date</b> <?php echo $row['created_at'] ?></label><br>
              <label><b>Announcement</b></label><br><br>
              <?php echo nl2br($row['description']) ?> <br>
            <center>
              <img src="announcement/<?php echo $row['cover_photo'] ?>" width="800" height="400">
            </center>
            </div><br>
            <?php
          }
          ?>
        </div>
      </div>
      <br>
      <footer>
        <div class="row">
          <div class="col-xl-3">&nbsp;<img src="images/retfinal.png" width="200" height="80" alt=""/></div>
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
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
