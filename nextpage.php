<?php 
// session_start();
include 'database.php';
$yr = $_POST['btn'];
$dept = $_POST['dept'];
$cat = $_POST['category'];
// echo "select from database where research is equal to year ".$yr;
// echo "and department from ".$dept;
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('.btn').click(function(){
				var row = $(this).closest('.card');
				var titleId = row.find('.title').val();
				var by = row.find('.by').val();
				var descrip = row.find('.descrip').val();
				var dateApp = row.find('.dateApp').val();

				$('#disp_title').html(titleId);
				$('#disp_descript').html(descrip);
				$('#disp_by').html(by);
				$('#disp_date').html(dateApp);
			});
		});
	</script>
	<style type="text/css">
		.mods span{
			/*font-family: Courier;*/
		}
		#divb label{
			font-family: Times New Roman;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<?php 
			include 'navbar.php';
			?>
			
			<!-- body code goes here -->
			<h1 class="text-center"><?php echo $dept ?> RESEARCHES OF <?php echo $yr ?></h1>
			<div class="text-end">
				<form action="nextpage.php" method="POST" class="form-inline my-2 my-lg-0 float-right">
        <input type="hidden" name="btn" value="<?php echo $yr ?>">
        <input type="hidden" name="dept" value="<?php echo $dept ?>">
        <input type="hidden" name="category" value="<?php echo $cat ?>">
        <button class="rounded btn-primary my-2 my-sm-0" type="submit">Refresh</button>
        </form>
        <?php 
        if($cat == 1){
        	 switch ($dept) {
         	case 'SBM':
         		# code...
         	?>
         	<a href="Student Researches/SBM/sbm.php"><button>Return</button></a>
         	<?php
         		break;
         	case 'SOED':
         		# code...
         	?>
         	<a href="Student Researches/SOED/soed.php"><button>Return</button></a>
         	<?php
         		break;
     		case 'SOICT':
         		# code...
         	?>
         	<a href="Student Researches/SOICT/sict.php"><button>Return</button></a>
         	<?php
         		break;
         	case 'SOIT':
         		# code...
         	?>
         	<a href="Student Researches/SOIT/soit.php"><button>Return</button></a>
         	<?php
         		break;
         	default:
         		# code...
         		break;
         }
     }else{
         	switch ($dept) {
         	case 'SBM':
         		# code...
         	?>
         	<a href="FacultyResearches/SBM/sbm.php"><button>Return</button></a>
         	<?php
         		break;
         	case 'SOED':
         		# code...
         	?>
         	<a href="FacultyResearches/SOED/soed.php"><button>Return</button></a>
         	<?php
         		break;
     		case 'SOICT':
         		# code...
         	?>
         	<a href="FacultyResearches/SICT/sict.php"><button>Return</button></a>
         	<?php
         		break;
         	case 'SOIT':
         		# code...
         	?>
         	<a href="FacultyResearches/SOIT/soit.php"><button>Return</button></a>
         	<?php
         		break;
         	
         	default:
         		# code...
         		break;
         }
     }
        ?>
          
			</div><br><br>
			<div class="row px-1">
				<?php
				if(isset($_POST['search'])){
					$searching = $_POST['searching'];
					$sel_research = mysqli_query($connection,"SELECT * FROM research WHERE (research_title LIKE '%$searching%' OR research_description LIKE '%$searching%' OR  made_by LIKE '%$searching%' OR month LIKE '%$searching%') AND dept='$dept' AND yr='$yr' AND research_category ='$cat' ") or die(mysqli_error($connection));
				}else{
					$sel_research = mysqli_query($connection,"SELECT * FROM research WHERE dept='$dept' AND yr='$yr' AND research_category ='$cat' ") or die(mysqli_error($connection));
				}
				while($row = mysqli_fetch_array($sel_research)){
					$name = explode(",", $row['made_by']);
					?>
					
					<div class="card col-3 py-1 px-1 mx-2">
						<div class="card-body" id="divb">
							<label>Title:</label><br>
							<b class="h5"><?php echo $row['research_title'] ?></b><br><br>
							<input type="hidden" name="title" class="title" value="<?php echo ucwords($row['research_title']) ?>">
							<input type="hidden" name="descrip" class="descrip" value="<?php echo ucwords($row['research_description']) ?>">
							<input type="hidden" name="by" class="by" value="<?php echo ucwords($row['made_by']) ?>">
							<input type="hidden" name="dateApp" class="dateApp" value="<?php echo ucwords($row['month']." - ".$row['yr']) ?>">
							<!-- Button trigger modal -->
						</div>
						<div class="card-footer">
							<button class="btn" style="height: 40px; width: 100px" value="<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>View</b></button>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<br><br>
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
	<!-- Modal -->
	<div class="modal fade mods" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<!-- Modal Body -->
				<div class="modal-body h5">
					<center>
						<span id="disp_title" class="h4"></span><br><br><br>
						<label class="text-muted">By:&nbsp;&nbsp;</label><br><span id="disp_by" class="text-muted"></span><br><br>
						<span id="disp_date" class="text-muted"></span><br><br><br>
						<label><b>Abstract: &nbsp;&nbsp;</b></label><br>
					</center>
						<span id="disp_descript" class="h6" style="text-align: justify-all;"></span><br><br>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>

