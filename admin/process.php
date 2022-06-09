<?php 
session_start();
include '../database.php';

// admin login
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	// check if account exist
	$qry = "SELECT * FROM accounts WHERE username='$username' AND password='$password' ";
	$select = mysqli_query($connection,$qry) or die (mysqli_error($connection));
	$num = mysqli_num_rows($select);
	$rows = mysqli_fetch_assoc($select);
	// if yes redirect to home.php
	if($num == 1){
		?>
		<script type="text/javascript">
			alert("Welcome <?php echo $rows['account_name'] ?>!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Incorrect Username or Password!");
			window.location.href='index.php';
		</script>
		<?php
	}
}

// adding researches of both student and faculty
if(isset($_POST['add_research'])){
	$title = $_POST['title'];
	$made_by = $_POST['made_by'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$dept = $_POST['dept'];
	$month = $_POST['month'];
	$yr = $_POST['year'];
	// $btnvalue = $_SESSION['btnValue'];

	// inserting research
	$insert_research = mysqli_query($connection,"INSERT INTO research (research_category,dept,research_title,made_by,research_description,month,yr) VALUES('$category','$dept','$title','$made_by','$description','$month','$yr')") or die (mysqli_error($connection));

	if($insert_research == TRUE){
		$_SESSION['btnValue'] = $btnvalue;
		?>
		<script type="text/javascript">
			alert("Research Successfully Added!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Adding Research!");
			window.location.href='home.php';
		</script>
		<?php
	}
}

// adding announcement
if(isset($_POST['add_announcement'])){
	$description = $_POST['announcement'];
	// inserting announcement
	$insert_announcement = mysqli_query($connection,"INSERT INTO announcement (description) VALUES('$description')") or die (mysqli_error($connection));

	if($insert_announcement == TRUE){
		?>
		<script type="text/javascript">
			alert("Announcement Successfully Added!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Adding Announcement!");
			window.location.href='home.php';
		</script>
		<?php
	}
}

// adding news and updates
if(isset($_POST['add_newsUpdates'])){
	$description = $_POST['news_update'];
	// inserting news and updates
	$insert_newsUpdate = mysqli_query($connection,"INSERT INTO news (description) VALUES('$description')") or die (mysqli_error($connection));

	if($insert_newsUpdate == TRUE){
		?>
		<script type="text/javascript">
			alert("News & Update Successfully Added!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Adding News & Update!");
			window.location.href='home.php';
		</script>
		<?php
	}
}

// adding extension programs
if(isset($_POST['add_extensionprog'])){
	$title = $_POST['ext_title'];
	$dept = $_POST['ext_dept'];
	$date = $_POST['ext_date'];
	$filetmp = $_FILES['progfile']['tmp_name'];
	$cover_photos = $_FILES['cover_photo']['name'];
	$cover_phototemp = $_FILES['cover_photo']['tmp_name'];
	$fileDest = '../extensionprograms';


	for($i=0; $i < count($filetmp); $i++ ){
		$filename = $_FILES['progfile']['name'][$i];
		$fileTemp = $_FILES['progfile']['tmp_name'][$i];

		// moving the uploaded file to destination folder
		if(move_uploaded_file($fileTemp,"$fileDest/$filename") && move_uploaded_file($cover_phototemp, "$fileDest/$cover_photos")){
			// echo "moved";
		}else{
			// echo "not moved";
		}

		// inserting the extension program
	$insert_extension = mysqli_query($connection,"INSERT INTO extensionprograms (ext_title,cover_photo,files,department,ext_date) VALUES('$title','$cover_photos','$filename','$dept','$date')") or die(mysqli_error($connection));


		if($insert_extension == TRUE){
			?>
			<script type="text/javascript">
			alert("Extension Program Successfully Added!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Adding Extension Program!");
			window.location.href='home.php';
		</script>
		<?php
		}
	}
}


if(isset($_POST['add_users'])){
	$username = $_POST['username_add'];
	$password = $_POST['password_add'];
	$account_name = $_POST['fullname'];
	
	$insert_account = mysqli_query($connection,"INSERT INTO accounts (account_name,username,password) 
		VALUES('$account_name','$username','$password')") or die (mysqli_error($connection));

	if($insert_account == TRUE){
			?>
			<script type="text/javascript">
				alert("Admin User Successfully Added!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Adding Admin User!");
			window.location.href='home.php';
		</script>
		<?php
		}
}


if(isset($_POST['update_account'])){
	$name_account =$_POST['name_account'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];
	
	$update_account = mysqli_query($connection,"UPDATE accounts SET account_name='$name_account',username='$username',password='$password' WHERE id='$id' ") or die (mysqli_error($connection));

	if($update_account == TRUE){
			?>
			<script type="text/javascript">
				alert("Admin User Account Successfully Updated!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Updating Admin User Account!");
			window.location.href='home.php';
		</script>
		<?php
		}
}

if(isset($_POST['delete_account'])){
	$id = $_POST['delete_account'];
	$delete = mysqli_query($connection,"DELETE FROM accounts WHERE id='$id' ")or die (mysqli_error($connection));
	if($delete == TRUE){
			?>
			<script type="text/javascript">
				alert("Account Successfully Deleted!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Error Deleting Account!");
			window.location.href='home.php';
		</script>
		<?php
		}
}
?>