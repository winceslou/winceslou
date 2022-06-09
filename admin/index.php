<?php 
session_start();
include '../database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-5.0.2/css/bootstrap.min.css">
	<script type="text/javascript">
		function shwPass() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
	</script>
</head>
<body>
	<div class="card col-5 mx-auto mt-5 shadow">
		<div class="card-header bg-dark">
			<div class="card-title text-center h3 text-light">
				ADMIN LOGIN
			</div>
		</div>
		<div class="card-body pt-3">
		<form action="process.php" method="POST">
			<label for="uname" class="h5">Username:</label>
			<input type="text" name="username" id="uname" class="form-control py-2 mb-3">
			<label for="psw" class="h5">Password:</label>
			<input type="password" name="password" id="psw" class="form-control py-2 mb-2">
			<input type="checkbox" id="chk" onclick="shwPass()"><label for="chk">Show Passsword</label>
			<div class="text-center">
				<button name="login" class="btn btn-lg btn-primary px-4 mt-3">LOGIN</button>
			</div>
		</form>
		</div>
	</div>
</body>
</html>