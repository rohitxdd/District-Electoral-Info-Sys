<?php
require('database.php');
session_start();
if (isset($_SESSION["email"])) {
	session_destroy();
}

$ref = @$_GET['q'];
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$email = stripslashes($email);
	$email = addslashes($email);
	$pass = stripslashes($pass);
	$pass = addslashes($pass);
	$email = mysqli_real_escape_string($con, $email);
	$pass = mysqli_real_escape_string($con, $pass);
	$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
	$result = mysqli_query($con, $str);
	if ((mysqli_num_rows($result)) != 1) {
		echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
		header("refresh:0;url=login.php");
	} else {
		$_SESSION['logged'] = $email;
		$row = mysqli_fetch_array($result);
		$_SESSION['name'] = $row[1];
		$_SESSION['id'] = $row[0];
		$_SESSION['email'] = $row[2];
		$_SESSION['password'] = $row[3];
		header('location: menu.php?q=1');
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login | Employee Information System </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<style type="text/css">
		body {
			background: url(image/back.jpg);
			height: 100%;
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}

		.container {
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.box-body {
			background-color: #ffffffa6;
			padding: 6rem 3rem;
			border-radius: 30px;
		}

		h1 {
			margin-bottom: 4rem;
		}

		.btn{
			margin-top: 1rem;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="box-body">
			<center>
				<h1>Delhi Electoral Information System</h1>
			</center>
			<!-- <form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>  User Id:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw"> Password:
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Register</a> Here..
								</div>
							</form> -->
			<form method="post" action="login.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">LogIn</button>
				<div class="form-group text-center">
					<span class="text-muted">Don't have an account?</span> <a href="register.php">Register</a> Here..
				</div>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>