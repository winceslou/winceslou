<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top"> <a class="navbar-brand" href="index.php"><img src="images/retfinal.png" width="200" height="70" alt=""/></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent1">
   <ul class="navbar-nav mr-auto text-dark">
     <li class="nav-item active"> <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a> </li>
    <li class="nav-item"> <a class="nav-link" href="extensionprograms.php">EXTENSIONS</a></li>
     <li class="nav-item">
        <div class="dropdown">
        <button type="button" class="border-0 bg-transparent nav-link btn dropdown-toggle" data-toggle="dropdown">
            RESEARCH
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="studentResearches.php">STUDENT</a>
            <a class="dropdown-item" href="facultyResearches.php">FACULTY</a>
          </div>
        </div>
    </li>
    <li class="nav-item"> <a class="nav-link" href="newsandupdates.php">NEWS</a></li>
     <li class="nav-item">
        <div class="dropdown">
        <button type="button" class="border-0 bg-transparent nav-link btn dropdown-toggle" data-toggle="dropdown">
            ABOUT US
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="qualityObjective.php">QUALITY OBJECTIVE</a>
            <a class="dropdown-item" href="orgchart.php">ORG CHART</a>
            <a class="dropdown-item" href="contact.php">CONTACT US</a>
          </div>
        </div>
    </li>
  </ul>
  <?php 
  if(isset($_POST['btn'])){
    ?>
       <form action="nextpage.php" method="POST" class="form-inline my-2 my-lg-0">
        <input type="hidden" name="btn" value="<?php echo $yr ?>">
        <input type="hidden" name="dept" value="<?php echo $dept ?>">
        <input type="hidden" name="category" value="<?php echo $cat ?>">
          <input class="form-control mr-sm-2" name="searching" type="search" autofocus placeholder="Search" aria-label="Search">
          <button class="btn my-2 my-sm-0" name="search" type="submit">Search</button>
        </form>
    <?php
  }else{

  }
  ?>
</div>
</nav>
