<?php
include("function/CONECT.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$user=$_POST["username"];
$pass=$_POST["password"];
$select_admin="SELECT * FROM admins WHERE username='$user'AND password='$pass'";
$resalt_admin=$conn->query($select_admin);
$num=$resalt_admin->num_rows;

if($num==1){
	
$_SESSION['login']=$user;
header("location:prodact.PHP");

}
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="User-Name" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
						<button type="supmit"class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
