
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-2 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2 align="center">Veiw all Data</h2>
	 				<a href="profile.php" class="btn btn-sm btn-outline-info">Your Profile</a>
	 			</div>
	 			<div class="card-body">
	 				<table class="table table-striped">
	 					<tr>
	 						<th>Id</th>
	 						<th>Name</th>
	 						<th>Email</th>
	 						<th>Cell</th>
	 						<th>Photo</th>
	 						<th>Active</th>
	 					</tr>
	 					<?php 
                           
                           $sql = "SELECT * FROM usersss";
                           $data = $connection -> query($sql);
                           
                           while($user_login_data = $data -> fetch_assoc()):

	 					 ?>
	 					<tr>
	 						<td>01</td>
	 						<td><?php echo $user_login_data['name']; ?></td>
	 						<td><?php echo $user_login_data['email']; ?></td>
	 						<td><?php echo $user_login_data['cell']; ?></td>
	 						<td>
	 							<img src="photo/<?php echo $user_login_data['photo']; ?>" alt="" style="height: 70px; width: 110px;">
	 						</td>
	 						<td>
	 							<a href="view.php?id=<?php echo $user_login_data['id']; ?>" class="btn btn-sm btn-info">View</a>
	 							<?php if( $user_login_data['id'] ==  $_SESSION['id'] ): ?>
	 							<a href="edit.php?id=<?php echo $user_login_data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
	 							<a id="delete_btn" href="delete.php?id=<?php echo $user_login_data['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
	 						<?php endif; ?>
	 						</td>
	 					</tr>
	 					<?php endwhile; ?>
	 				</table>
	 			</div>
	 		</div>
	 	</div>
	 </div>

      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
       <script>
      	$('a#delete_btn').click(function(){
           
	          let con = confirm('Are You Sure');
	          if ( con == true ) {
	            
	            return true;

	          }else{
	            
	           return false; 

	          }

	      	});
      </script>
</body>
</html>