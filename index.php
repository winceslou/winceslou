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
  	    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="">
  	      <ol class="carousel-indicators">
  	        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
  	        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
  	        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
          </ol>
  	      <div class="carousel-inner" role="listbox">
  	        <div class="carousel-item active"> <img class="d-block mx-auto" src="images/1.jpg" alt="First slide" style="width: 900px; height: 500px;">
  	          <div class="carousel-caption">
  	            <h5>&nbsp;&nbsp;</h5>
  	            <p></p>
              </div>
            </div>
  	        <div class="carousel-item"> <img class="d-block mx-auto" src="images/2.jpg" alt="Second slide">
  	          <div class="carousel-caption" style="width: 900px; height: 500px;">
  	            <h5></h5>
  	            <p></p>
              </div>
            </div>
  	        <div class="carousel-item"> <img class="d-block mx-auto" src="images/3.jpg" alt="Third slide">
  	          <div class="carousel-caption" style="width: 900px; height: 500px;">
  	            <h5></h5>
  	            <p></p>
              </div>
            </div>
          </div>
  	      <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
  	    <div class="text-break">&nbsp;</div>
<h1 class="text-center">Research, Extension &amp; Training<span lang="en-ph"> 
Website</span> of WVS<span lang="en-ph">U</span>-PC</h1>
<div class="text-break">&nbsp;</div>
<div class="row">
      <div class="col-xl-4">
            <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row1.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">ABOUT US&nbsp;</h5>
                <p class="card-text">In this section you can see about the RET information such as the objective and the Organizational Chart.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                <a href="about.php" class="btn btn-primary">READ MORE&nbsp;</a> </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row2.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">EXTENSION PROGRAMS&nbsp;&nbsp;</h5>
                <p class="card-text">In this section you can see the extension programs and&nbsp; information about campus accreditation.&nbsp; &nbsp; &nbsp; &nbsp;</p>
                <a href="extensionprograms.php" class="btn btn-primary">READ MORE&nbsp;</a> </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row3.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">STUDENTS RESEARCHES&nbsp;</h5>
                <p class="card-text">In this section you can see the past researches that has been approved and posted in our school library.&nbsp;&nbsp;</p>
                <a href="studentResearches.php" class="btn btn-primary">READ MORE&nbsp;</a> </div>
            </div>
          </div>
        </div>
		  <br>
		  <br>
<div class="row">
  <div class="col-xl-4">
    <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row3.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">FACULTY RESEARCHES&nbsp;</h5>
        <p class="card-text">In this section you can see the faculty researches that has been approved and on the RET office.&nbsp; &nbsp; &nbsp;</p>
        <a href="facultyResearches.php" class="btn btn-primary">READ MORE&nbsp;</a></div>
    </div>
  </div>
  <div class="col-xl-4">
    <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row4.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">NEWS &amp; UPDATES&nbsp; &nbsp;</h5>
        <p class="card-text">In this section you can see the news and updates regarding on the&nbsp; what happening inside the RET office.</p>
        <a href="newsandupdates.php" class="btn btn-primary">READ MORE&nbsp;</a></div>
    </div>
  </div>
  <div class="col-xl-4">
    <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="images/row5.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">&nbsp;CONTACT US</h5>
        <p class="card-text">In this section you can see persons to contact for some queries regarding on your concern on RET Office.&nbsp;</p>
        <a href="contact.php" class="btn btn-primary">READ MORE&nbsp;</a></div>
    </div>
  </div>
</div>
<br>
<br>
	    <br>
<div id="accordion1" role="tablist">
 <div class="card">
        <div class="card-header" role="tab" id="headingOne1">
              <h5 class="mb-0"> <a data-toggle="collapse" href="#collapseOne1" role="button" aria-expanded="true" aria-controls="collapseOne1">ANNOUNCEMENTS</a> </h5>
        </div>
            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordion1">
              <div class="card-body h5" style="overflow: scroll; height: 250px">
                <?php 
                $sel_announce = mysqli_query($connection,"SELECT * FROM announcement ORDER BY id DESC") or die (mysqli_error($connection));
                while($row = mysqli_fetch_array($sel_announce)){
                  ?>
                <div class="border-bottom border-dark pb-1 pt-2">
                  <label><b>Date</b> <?php echo $row['created_at'] ?></label><br>
                  <label>Announcement</label><br>
                  <?php echo nl2br($row['description']) ?>
                </div>
                  <?php
                }
                ?>
            </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo1">
              <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo1" role="button" aria-expanded="false" aria-controls="collapseTwo1"> CIVIL SERVICE REVIEWER&nbsp; &nbsp; &nbsp; </a> </h5>
        </div>
        <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordion1">
              <div class="card-body">In this section you can view samples of reviewer.</div>
            <div class="btn" ><a href="index.php">CLICK ME</a></div> 
            </div>
      </div>
      <div class="card">
            <div class="card-header" role="tab" id="headingThree1">
              <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree1" role="button" aria-expanded="false" aria-controls="collapseThree1"> RESEARCH, EXTENSION &amp; TRAINING PROGRAMS AND ACTIVITIES&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a> </h5>
            </div>
            <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1" data-parent="#accordion1">
              <div class="card-body">In this section you can view RESEARCH, EXTENSION TRAINING PROGRAMS AND ACTIVITIES </div>
                <div class="btn" ><a href="index.php">CLICK ME</a></div> 
            </div>
</div>
</div>
<br>
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
