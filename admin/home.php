<?php 
// session_start();
include '../database.php';
date_default_timezone_set("Asia/Manila");
$cur_yr = date('Y');
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-5.0.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="../js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('.editBtn').click(function(){
				var row = $(this).closest('tr');
				var name = row.find('.accounts_name').val();
				var uname = row.find('.uname').val();
				var psw = row.find('.psw').val();
				var accIDs = row.find('.accID').val();
				
				// var name = $('.accounts_name').val();
				// var uname = $('.uname').val();
				// var psw = $('.psw').val();

				console.log(name);
				console.log(uname);
				console.log(psw);
				console.log(accIDs);

				$('#acc_name').html(name);
				$('#acc_username').html(uname);
				$('#acc_psw').html(psw);
				$('#acc_id').html(accIDs);
			});
		});

		$(document).ready(function(){
			$('.delBtn').click(function(){
				$( "#formTarget" ).submit();
			});
		});

	</script>
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
				<a class="nav-link" aria-current="page" href=""><button name="btnValue" class="btn text-light" value="Home">Home</button></a>
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
	<div class="container">
		<form action="edit.php" method="POST">
			<table class="table table-bordered h6" border>
				<?php
				$btnvalue="";
				if(isset($_POST['btnValue'])){
					if(empty($_POST['btnValue'])) {

					}else{
						$btnvalue = $_POST['btnValue'];
					}
					switch($btnvalue){
						case 'Research':
							// echo "Research";
						?>
						<div class="text-end mt-3 mb-2">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Add Research
							</button>
						</div>
						<div>
							<!-- Display Added Research -->
							<thead class="table-dark">
								<tr style="text-transform: uppercase;" class="h5 text-center">
									<th>Title</th>
									<th>School</th>
									<th>By</th>
									<th width="15%">Date</th>
									<th>Abstract</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sel_research = mysqli_query($connection,"SELECT * FROM research ORDER BY id DESC") or die(mysqli_error($connection));
								while($res = mysqli_fetch_array($sel_research)){
									$id = $res['id'];
									?>
									<tr>
										<input type="hidden" name="tbl_name" value="research">
										<td><?php echo $res['research_title'] ?></td>
										<td><?php echo $res['dept'] ?></td>
										<td><?php echo $res['made_by'] ?></td>
										<td class="text-center"><?php echo $res['month']."-".$res['yr'] ?></td>
										<td><?php echo nl2br($res['research_description']) ?></td>
										<td>
											<button class="btn btn-info mb-2 px-3" name="edit" value="<?php echo $id ?>">Edit</button>
											<button name="delete" class="btn btn-danger" value="<?php echo $id ?>">Delete</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</div>
						<?php
						break;
						case 'Extension_Programs':
							// echo "Extension Programs";
						?>
						<div class="text-end mt-3 mb-2">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extensionModal">
								Add Extextion Program
							</button>
						</div>
						<div>
							<thead class="table-dark">
								<tr style="text-transform: uppercase;" class="h5 text-center">
									<td>No.</td>
									<td>Program Title</td>
									<th>Department</th>
									<td>Date of Event</td>
									<td>Photo</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								$sel_research = mysqli_query($connection,"SELECT * FROM extensionprograms ORDER BY id DESC") or die(mysqli_error($connection));
								while($res = mysqli_fetch_array($sel_research)){
									$id = $res['id'];
									?>
									<tr>
										<input type="hidden" name="tbl_name" value="extension">
										<td><?php echo $i++; ?></td>
										<td><?php echo nl2br($res['ext_title']) ?></td>
										<td><?php echo $res['department'] ?></td>
										<td><?php echo $res['ext_date'] ?></td>
										<td class="text-center"><a href="../extensionprograms/<?php echo $res['cover_photo'] ?>" target="_blank"><img src="../extensionprograms/<?php echo $res['cover_photo']?>" width="200" height="200"></a></td>
										<td>
											<button class="btn btn-info mb-2 px-3" name="edit" value="<?php echo $id ?>">Edit</button>
											<button name="delete" class="btn btn-danger" value="<?php echo $id ?>">Delete</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</div>
						<?php
						break;
						case 'Announcements':
							// echo "Announcements";
						?>
						<div class="text-end mt-3 mb-2">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#announcementModal">
								&plus; Add New
							</button>
						</div>
						<div>
							<thead class="table-dark">
								<tr style="text-transform: uppercase;" class="h5 text-center">
									<td>No.</td>
									<td>Announcement</td>
									<th>Cover Photo</th>
									<td>Date Posted</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								$sel_research = mysqli_query($connection,"SELECT * FROM announcement ORDER BY id DESC") or die(mysqli_error($connection));
								while($res = mysqli_fetch_array($sel_research)){
									$id = $res['id'];
									?>
									<tr>
										<input type="hidden" name="tbl_name" value="announcement">
										<td><?php echo $i++; ?></td>
										<td><?php echo nl2br($res['description']) ?></td>
										<td><img src="../announcement/<?php echo $res['cover_photo'] ?>" width="300" height="250"></td>
										<td><?php echo $res['created_at'] ?></td>
										<td>
											<button class="btn btn-info mb-2 px-3" name="edit" value="<?php echo $id ?>">Edit</button>
											<button name="delete" class="btn btn-danger" value="<?php echo $id ?>">Delete</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</div>
						<?php
						break;
						case 'News_Updates':
		// echo "News &amp; Updates";
						?>
						<div class="text-end mt-3 mb-2">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsModal">
								&plus; Add New
							</button>
						</div>
						<div>
							<thead class="table-dark">
								<tr style="text-transform: uppercase;" class="h5 text-center">
									<td>No.</td>
									<td>News</td>
									<th>Cover Photo</th>
									<td>Date Posted</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1;
								$sel_research = mysqli_query($connection,"SELECT * FROM news ORDER BY id DESC") or die(mysqli_error($connection));
								while($res = mysqli_fetch_array($sel_research)){
									$id = $res['id'];
									?>
									<tr>
										<input type="hidden" name="tbl_name" value="news">
										<td><?php echo $i++; ?></td>
										<td><?php echo nl2br($res['description']) ?></td>
										<td><img src="../news_update/<?php echo $res['cover_photo'] ?>" width="300" height="250"></td>
										<td><?php echo $res['created_at'] ?></td>
										<td>
											<button class="btn btn-info mb-2 px-3" name="edit" value="<?php echo $id ?>">Edit</button>
											<button name="delete" class="btn btn-danger" value="<?php echo $id ?>">Delete</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</div>
						<?php
						break;
						default:
						?>

						<?php
					}
					
				}else{
					?>
					<div class="text-center mt-5">
						<img src="../images/retfinal.png" width="800" height="400" style="opacity: 0.6">
					</div>
					<?php
				}
				?>		
			</table>
		</form>
	</div>


	<!-- Modals -->
	<form action="process.php" method="POST" class="" enctype="multipart/form-data">

		<!-- Vertically centered modal -->
		<div class="modal fade col-8" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Research</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label class="h5">Research Title</label><input type="text" name="title" class="form-control mb-1">
						<label class="h5">Category:</label>
						<select class="form-select mb-1" name="category">
							<option selected disabled>--Select Category--</option>
							<option value="1">Students</option>
							<option value="2">Faculty</option>
						</select>
						<label class="h5">Department:</label>
						<select class="form-select mb-1" name="dept">
							<option selected disabled>--Select Department--</option>
							<option value="SBM"> School of Business and Management (SBM)</option>
							<option value="SOED">School of Education (SOED)</option>
							<option value="SOIT">School of Industrial Tech (SoIT)</option>
							<option value="SOICT">School of Info and comm tech (SoICT)</option>
						</select>
						<label class="h5">Abstract:</label><textarea name="description" class="form-control mb-1" rows="7"></textarea>
						<label class="h5">By:</label><input type="text" name="made_by" class="form-control mb-1">
						<label class="h5">Month:</label>
						<select class="form-select" name="month">
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
						<label class="h5">Year:</label><input type="number" name="year" class="form-control" value="<?php echo $cur_yr ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="add_research" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">

						<h5 class="modal-title" id="announcementModal">Add Announcement</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label for="announcementBody">Announcement</label>
						<textarea name="announcement" id="announcementBody" class="form-control" rows="12"></textarea><br>
						<label>Cover Photo</label>
						<input type="file" name="cover_photo_announcement[]" class="form-control" multiple>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="add_announcement" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">

						<h5 class="modal-title" id="newsModal">Add News & Updates</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label for="announcementBodys">News & Update</label>
						<textarea name="news_update" id="announcementBodys" class="form-control" rows="12"></textarea><br>
						<label>Cover Photo</label>
						<input type="file" name="cover_photo_news[]" class="form-control" multiple>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="add_newsUpdates" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form action="process.php" method="POST" enctype="multipart/form-data">
		<div class="modal fade" id="extensionModal" tabindex="-1" aria-labelledby="extensionModal" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">

						<h5 class="modal-title" id="extensionModal">Add Extension Program</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label >Program Title</label>
						<input type="text" name="ext_title" class="form-control mb-2">
						<label >Department</label>
						<select class="form-select mb-1" name="ext_dept">
							<option selected disabled>--Select Department--</option>
							<option value="SBM"> School of Business and Management (SBM)</option>
							<option value="SOED">School of Education (SOED)</option>
							<option value="SOIT">School of Industrial Tech (SoIT)</option>
							<option value="SOICT">School of Info and comm tech (SoICT)</option>
						</select>
						<label>Date of Event</label>
						<input type="date" name="ext_date" class="form-control mb-2">
						<label>Cover Photo</label>
						<input type="file" name="cover_photo" class="form-control">
						<label>Program Files</label>
						<input type="file" name="progfile[]" class="form-control" multiple="">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="add_extensionprog" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- modal of list of admin user accounts -->
	<div class="modal fade" id="accounts" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalToggleLabel">List Of User Accounts</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="process.php" method="POST">
						<table class="table">
							<tr>
								<th>Account Name</th>
								<th>Username</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
							<?php 
							$sel_user = mysqli_query($connection,"SELECT * FROM accounts");
							while($res2 = mysqli_fetch_array($sel_user)){
								$fullname = $res2['account_name'];
								$username = $res2['username'];
								$password = $res2['password'];
								$id = $res2['id'];
								?>
								<tr>
									<td><?php echo $res2['account_name'] ?></td>
									<td><?php echo $res2['username'] ?></td>
									<td><?php echo $res2['password'] ?></td>
									<td>
										<input type="hidden" name="id" class="accID" value="<?php echo $id ?>">
										<input type="hidden" name="" class="accounts_name" value="<?php echo $fullname ?>">
										<input type="hidden" name="" class="uname" value="<?php echo $username ?>">
										<input type="hidden" name="" class="psw" value="<?php echo $password ?>">
										<div class="row">
											<button type="button" class="btn btn-warning col mx-1 editBtn" data-bs-target="#editaccounts" data-bs-toggle="modal" data-bs-dismiss="modal">Edit</button>
											<button class="btn btn-danger col mx-1 delBtn" name="delete_account" value="<?php echo $id ?>">Delete</button>
										</div>
									</td>
								</tr>
								<?php
							}
							?>
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<!-- trigger to view the modal for adding admin user account -->
					<button class="btn btn-primary" data-bs-target="#adduserAccount" data-bs-toggle="modal" data-bs-dismiss="modal">Add user</button>
				</div>
			</div>
		</div>
	</div>


	<!-- modal for adding admin user account -->
	<form action="process.php" method="POST">
		<div class="modal fade" id="adduserAccount" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">

						<h5 class="modal-title" id="exampleModalToggleLabel2">Add User</h5>
						<button type="button" class="btn-close" data-bs-target="#accounts" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label >User Account Name</label>
						<input type="text" name="fullname" class="form-control mb-2">
						<label>Username</label>
						<input type="text" name="username_add" class="form-control mb-2">
						<label>Password</label>
						<input type="password" name="password_add" class="form-control">
					</div>
					<div class="modal-footer">
						<!-- trigger to view the list of admin user account modal -->
						<button type="button" class="btn btn-secondary" data-bs-target="#accounts" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="add_users" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>


		<!-- modal for editing admin user account -->
		<div class="modal fade" id="editaccounts" tabindex="-1" aria-labelledby="editaccounts" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">

						<h5 class="modal-title" id="editaccounts">Edit Accounts</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<textarea hidden="" id="acc_id" name="id"></textarea>
						<label>Account Name:</label><textarea name="name_account" id="acc_name" class="form-control" rows="1"></textarea>
						<label>Username:</label><textarea name="username" id="acc_username" class="form-control" rows="1"></textarea>
						<label>Password:</label><textarea name="password" id="acc_psw" class="form-control" rows="1"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-target="#accounts" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="update_account" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>