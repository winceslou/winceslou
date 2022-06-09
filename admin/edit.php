<?php 
session_start();
include '../database.php';
date_default_timezone_set("Asia/Manila");
$cur_yr = date('Y');
$id="";
$table_name="";
$select_tbl ="";
if(isset($_POST['edit'])){
	if(empty($_POST['edit']) && empty($_POST['tbl_name'])){
		$id= $_SESSION['id'];
		$table_name= $_SESSION['tbl_name'];
	}else{
		$id = $_POST['edit'];
		$table_name = $_POST['tbl_name'];
	}
	switch ($table_name) {
		case 'research':
		# code...
		$qry = "SELECT * FROM research WHERE id='$id'";
		$select_tbl = mysqli_query($connection,$qry) or die(mysqli_error($connection));
		break;
		case 'announcement':
		# code...
		$qry = "SELECT * FROM announcement WHERE id='$id' ";
		$select_tbl = mysqli_query($connection,$qry) or die(mysqli_error($connection));
		break;
		case 'news':
		# code...
		$qry = "SELECT * FROM news WHERE id='$id'";
		$select_tbl = mysqli_query($connection,$qry) or die(mysqli_error($connection));
		break;
		case 'extension':
		# code...
		$qry = "SELECT * FROM extensionprograms WHERE id='$id'";
		$select_tbl = mysqli_query($connection,$qry) or die(mysqli_error($connection));
		break;
		default:
		# code...
		break;
	}
}elseif(isset($_POST['delete'])){
	$id = $_POST['delete'];
	$table_name = $_POST['tbl_name'];
	$del ="";

	switch ($table_name) {
		case 'research':
		$del = mysqli_query($connection,"DELETE FROM research WHERE id='$id'");
		break;
		case 'announcement':
		$del = mysqli_query($connection,"DELETE FROM announcement WHERE id='$id'");
		break;
		case 'news':
		$del = mysqli_query($connection,"DELETE FROM news WHERE id='$id'");
		break;
		case 'extension':
		$del = mysqli_query($connection,"DELETE FROM extensionprograms WHERE id='$id'");
		break;
	}

	if($del){
		?>
		<script type="text/javascript">
			alert("Deletion Successfull");
			window.location.href="home.php";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Deletion Not Successfull");
			window.location.href="home.php";
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-5.0.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="home.php">
				<img src="../images/retfinal.png" width="170" height="70">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="nav-link" aria-current="page" href="home.php"><button name="btnValue" class="btn text-light" value="Home">Home</button></a>
				<form action="home.php" method="POST">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href=""><button name="btnValue" class="btn text-light" value="Research">Research</button></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=""><button name="btnValue" class="btn text-light" value="Extension_Programs">Extension Programs</button></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=""><button name="btnValue" class="btn text-light" value="Announcements">Announcements</button></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=""><button name="btnValue" class="btn text-light" value="News_Updates">News & Updates</button></a>
						</li>
					</ul>
				</form>
				<button type="button" class="btn text-light" data-bs-toggle="modal" href="#accounts" role="button">
								User Accounts
				</button>
			</div>
		</div>
		<div class="d-flex">
			<a href="unset.php" class="btn text-light mx-3">Logout</a>
		</div>
	</nav>
	
	<div class="row pt-2">
		<form action="edit_process.php" method="POST" enctype="multipart/form-data">
			<?php 
			switch ($table_name) {
				case 'research':
				while($row = mysqli_fetch_array($select_tbl)){
					?>
					<div class="card col-7 mx-auto">
						<!-- content here -->
						<div class="card-body">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="hidden" name="tbl_name" value="<?php echo $table_name ?>">
							<label>Title:</label>
							<input type="text" name="title" class="form-control" value="<?php echo $row['research_title'] ?>">
							<label>Department:</label>
							<input type="text" name="department" value="<?php echo $row['dept'] ?>" class="form-control">
							<label class="">Category:</label>
							<select class="form-select" name="category">
								<?php 
								if($row['research_category'] == 1){
									?>
									<option value="1" selected="">Students</option>
									<option value="2">Faculty</option>
									<?php
								}else{
									?>
									<option value="1">Students</option>
									<option value="2" selected="">Faculty</option>
									<?php
								}
								?>
								
							</select>
							<label>By:</label>
							<input type="text" name="by" value="<?php echo $row['made_by'] ?>" class="form-control">
							<label>Month:</label>
							<select class="form-select" name="month">
								<option selected="" value="<?php echo $row['month'] ?>"><?php echo $row['month'] ?></option>
								<option value="January">January</option>
								<option value="Febuary">Febuary</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
							<label>Year:</label>
							<input type="number" name="yr" value="<?php echo $row['yr'] ?>" class="form-control">
							<label>Abstract:</label>
							<textarea name="research_description" value="<?php echo $row['research_description'] ?>" class="form-control text-center" rows="9"><?php echo $row['research_description'] ?></textarea>
						</div>
						<div class="card-footer text-end">
							<button name="update_research" class="btn btn-success px-3">Save</button>
							<a href="home.php"><button type="button" class="btn btn-danger">Cancel</button></a>
						</div>
					</div>
					<?php
				}
				break;
				case 'announcement':
				while($row = mysqli_fetch_array($select_tbl)){
					?>
					<div class="row">
						<div class="card col-7 mx-auto">
							<!-- content here -->
							<div class="card-body">
								<input type="hidden" name="id" value="<?php echo $id ?>">
								<input type="hidden" name="tbl_name" value="<?php echo $table_name ?>">
								<label>Announcement:</label>
								<textarea rows="17" name="description" value="<?php echo $row['description'] ?>" class="form-control"><?php echo $row['description'] ?></textarea>
							</div>
							<div class="card-footer text-end">
								<button name="update_announcement" class="btn btn-success px-3">Save</button>
								<a href="home.php"><button type="button" class="btn btn-danger">Cancel</button></a>
							</div>
						</div>
					</div>
					<?php
				}
				break;
				case 'news':
				while($row = mysqli_fetch_array($select_tbl)){
					?>
					<div class="row">
						<div class="card col-7 mx-auto">
							<!-- content here -->
							<div class="card-body">
								<input type="hidden" name="id" value="<?php echo $id ?>">
								<input type="hidden" name="tbl_name" value="<?php echo $table_name ?>">
								<label>News & Update:</label>
								<textarea rows="17" name="description" value="<?php echo $row['description'] ?>" class="form-control"><?php echo $row['description'] ?></textarea>
							</div>
							<div class="card-footer text-end">
								<button name="update_news" class="btn btn-success px-3">Save</button>
								<a href="home.php"><button type="button" class="btn btn-danger">Cancel</button></a>
							</div>
						</div>
					</div>
					<?php
				}
				break;
				case 'extension':
				while($row = mysqli_fetch_array($select_tbl)){
					?>
					<div class="row">
						<div class="card col-7 mx-auto">
							<!-- content here -->
							<div class="row">
								<div class="card col-7 mx-auto">
									<!-- content here -->
									<div class="card-body">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="hidden" name="tbl_name" value="<?php echo $table_name ?>">
										<label>Extension Program Title:</label>
										<input type="text" name="ext_title" value="<?php echo $row['ext_title'] ?>" class="form-control">
										<label>Department</label>
										<input type="text" name="ext_dept" value="<?php echo $row['department'] ?>" class="form-control" placeholder="SOED, SBM, SOIT, SICT">
										<label>Extension Program Date:</label>
										<input type="date" name="ext_date" value="<?php echo $row['ext_date'] ?>" class="form-control">
										<label>Extension Program File:</label>
										<input type="file" name="ext_filename[]" value="<?php echo $row['ext_filename'] ?>" class="form-control">
									</div>
									<div class="card-footer text-end">
										<button name="update_extension" class="btn btn-success px-3">Save</button>
										<a href="home.php"><button type="button" class="btn btn-danger">Cancel</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<
					<?php
				}
				break;
				default:
				break;
			}
			?>
		</form>
	</div>
</body>
</html>