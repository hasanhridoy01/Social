
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>
<?php session_start(); ?>
<?php 
   
   if ( isset($_GET['logout']) AND $_GET['logout'] ==  'success' ) {
   	 

   	 //Destroy cookie
     setcookie('user_login_data','', time() - (60*60*24*365*10));

   	 //deatroy session
   	 session_destroy();

   	 //Relogin System
   	 header('location:index.php');

   }

    //Login security
   if ( !isset($_SESSION['id']) AND !isset($_SESSION['name']) AND !isset($_SESSION['email']) ) {
   	 	
   	 	header('location:index.php');

    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-4 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2>View Your Profile</h2>
	 			</div>
	 			<div class="card-header">Profile Of <?php echo $_SESSION['name']; ?> <a href="data.php" class="btn btn-sm btn-outline-info float-right">All Mumbers</a></div>
	 			<img src="photo/<?php echo $_SESSION['photo']; ?>" alt="" style="height: 300px; width: 300px; display: block; border-radius: 50%; border: 10px solid white; padding: 0px;" class="shadow-lg mt-4 mx-auto">
	 			<div class="card-body">
	 			<table class="table table-striped">
	 				<tr>
	 					<td>name</td>
	 					<td><?php echo $_SESSION['name']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>Email</td>
	 					<td><?php echo $_SESSION['email']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>Cell</td>
	 					<td><?php echo $_SESSION['cell']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>Uname</td>
	 					<td><?php echo $_SESSION['uname']; ?></td>
	 				</tr>
	 			</table>
	 			<a href="?logout=success">logout</a>
	 			</div>
	 		</div>
	 	</div>
	 </div>


      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
</body>
</html>