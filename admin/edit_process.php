<?php 
session_start();
include '../database.php';

if(isset($_POST['update_research'])){
	$title = $_POST['title'];
	$by = $_POST['by'];
	$month = $_POST['month'];
	$yr = $_POST['yr'];
	$dept = $_POST['department'];
	$category = $_POST['category'];
	$research_description = $_POST['research_description'];
	$id = $_POST['id'];
	$table_name = $_POST['tbl_name'];
	
	$update_research = mysqli_query($connection,"UPDATE research SET research_category='$category',dept='$dept',research_title='$title',made_by ='$by',research_description='$research_description', month='$month', yr ='$yr' WHERE id='$id' ");
	
	if($update_research){
		?>
		<script type="text/javascript">
			alert("Update Saved!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		$_SESSION['id'] = $id;
		$_SESSION['tbl_name'] = $table_name;
		?>
		<script type="text/javascript">
			alert("Update Saving Error!");
			window.location.href='edit.php';
		</script>
		<?php
	}
}

if(isset($_POST['update_announcement'])){
	$id = $_POST['id'];
	$table_name = $_POST['tbl_name'];
	$description = $_POST['description'];
	$cover_phototmp = $_FILES['cover_photo_announcement']['tmp_name'];
	$fileDest = '../announcement';
	
	for ($i=0; $i <count($cover_phototmp) ; $i++) { 
		$cover_photos = $_FILES['cover_photo_announcement']['name'][$i];
		$cover_phototemp = $_FILES['cover_photo_announcement']['tmp_name'][$i];
		if(move_uploaded_file($cover_phototemp, "$fileDest/$cover_photos")){
			echo "moved";
		}else{
			echo "not moved";
		}
		if(empty($cover_phototemp)){
			$update_announcement = mysqli_query($connection,"UPDATE announcement SET description='$description', updated_at=now() WHERE id='$id' ");
		}else{
	$update_announcement = mysqli_query($connection,"UPDATE announcement SET description='$description',cover_photo='$cover_photos', updated_at=now() WHERE id='$id' ");
		}
	if($update_announcement){
		?>
		<script type="text/javascript">
			alert("Update Saved!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		$_SESSION['id'] = $id;
		$_SESSION['tbl_name'] = $table_name;
		?>
		<script type="text/javascript">
			alert("Update Saving Error!");
			window.location.href='edit.php';
		</script>
		<?php
		}
	}
}

if(isset($_POST['update_news'])){
	$id = $_POST['id'];
	$table_name = $_POST['tbl_name'];
	$description = $_POST['description'];
	$fileDest = '../news_update';
	$cover_phototmp = $_FILES['cover_photo_news']['tmp_name'];

	for ($i=0; $i < count($cover_phototmp) ; $i++) { 
		# code...
		$cover_photos = $_FILES['cover_photo_news']['name'][$i];
		$cover_phototemp = $_FILES['cover_photo_news']['tmp_name'][$i];
		move_uploaded_file($cover_phototemp, "$fileDest/$cover_photos");

		if(empty($cover_phototemp)){
			$update_news = mysqli_query($connection,"UPDATE news SET description='$description',updated_at=now() WHERE id='$id' ");		
		}else{
	$update_news = mysqli_query($connection,"UPDATE news SET description='$description',cover_photo='$cover_photos', updated_at=now() WHERE id='$id' ");
}
	if($update_news){
		?>
		<script type="text/javascript">
			alert("Update Saved!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		$_SESSION['id'] = $id;
		$_SESSION['tbl_name'] = $table_name;
		?>
		<script type="text/javascript">
			alert("Update Saving Error!");
			window.location.href='edit.php';
		</script>
		<?php
		}
	}
}

if(isset($_POST['update_extension'])){
	$id = $_POST['id'];
	$table_name = $_POST['tbl_name'];
	$ext_title = $_POST['ext_title'];
	$ext_dept = $_POST['ext_dept'];
	$ext_date = $_POST['ext_date'];
	$filetmp = $_FILES['progfile']['tmp_name'];
	$cover_photos = $_FILES['cover_photo']['name'];
	$cover_phototemp = $_FILES['cover_photo']['tmp_name'];
	$fileDest = '../extensionprograms';


	for($i=0; $i < count($filetmp); $i++ ){
		$filename = $_FILES['progfile']['name'][$i];
		$fileTemp = $_FILES['progfile']['tmp_name'][$i];

		// moving the uploaded file to destination folder
		if(move_uploaded_file($fileTemp,"$fileDest/$filename") || move_uploaded_file($cover_phototemp, "$fileDest/$cover_photos")){
			// echo "moved";
		}else{
			// echo "not moved";
		}

		if(empty($fileTemp)){
			$update_extension = mysqli_query($connection,"UPDATE extensionprograms SET ext_title='$ext_title', department='$ext_dept', ext_date='$ext_date', updated_at=now() WHERE id='$id' ") or die(mysqli_error($connection));
		}else{
		$update_extension = mysqli_query($connection,"UPDATE extensionprograms SET ext_title='$ext_title', ext_date='$ext_date',cover_photo='$cover_photos',files='$filename', department='$ext_dept', updated_at=now() WHERE id='$id' ") or die(mysqli_error($connection));
		}
		if($update_extension){
		?>
		<script type="text/javascript">
			alert("Update Saved!");
			window.location.href='home.php';
		</script>
		<?php
	}else{
		$_SESSION['id'] = $id;
		$_SESSION['tbl_name'] = $table_name;
		?>
		<script type="text/javascript">
			alert("Update Saving Error!");
			window.location.href='edit.php';
		</script>
		<?php
		}
	}
}
?>