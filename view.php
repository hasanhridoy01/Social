
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
     
     <?php 
         
         if ( isset($_GET['id']) ) {
         	
         	$single_id = $_GET['id'];

         }
         
         $sql = "SELECT * FROM usersss WHERE id='$single_id'";
         $data = $connection -> query($sql);
         $Single_data = $data -> fetch_assoc();


      ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-4 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2>View Your Profile</h2>
	 				<a href="data.php" class="btn btn-sm btn-outline-info">All Mumbers</a>
	 			</div>
	 			<div class="card-body">
	 		     <img src="photo/<?php echo  $Single_data['photo']; ?>" alt="" style="height: 300px; width: 300px; display: block; border: 10px solid white; margin-bottom: 30px;" class="shadow-lg mt-4 mx-auto">
	 			<table class="table table-striped">
	 				<tr>
	 					<td>name</td>
	 					<td><?php echo  $Single_data['name']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>email</td>
	 					<td><?php echo  $Single_data['email']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>cell</td>
	 					<td><?php echo  $Single_data['cell']; ?></td>
	 				</tr>
	 				<tr>
	 					<td>uname</td>
	 					<td><?php echo  $Single_data['uname']; ?></td>
	 				</tr>
	 			</table>
	 			</div>
	 		</div>
	 	</div>
	 </div>


      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
</body>
</html>