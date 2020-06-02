
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>

	<?php 
       
       if ( isset($_POST['Registration']) ) {
       	  
       	  /**
       	   * Data Receive
       	   */
       	  $name = $_POST['name'];
       	  $uname = $_POST['uname'];
       	  $email = $_POST['email'];
       	  $cell = $_POST['cell'];

       	  //password varification
       	  $pass = $_POST['pass'];
       	  $cpass = $_POST['cpass'];

       	  if ( $pass == $cpass ) {
       	  	
       	  	$confirm_pass = true;

       	  }else{
            
            $confirm_pass = false;

       	  }

       	  //hash password
       	  $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

       	  //data check function
       	  $uname_check = datacheck($connection, 'uname', $uname, 'usersss');
       	  $email_check = datacheck($connection, 'email', $email, 'usersss');
       	  $cell_check = datacheck($connection, 'cell', $cell, 'usersss');

       }

       if ( empty($name) || empty($uname) || empty($email) || empty($cell) ) {
       
          $massage = '<p class="alert alert-danger"> All files are requide! </p>';

       }elseif ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
       	
          $massage = '<p class="alert alert-danger"> Invalid Email! </p>';

       }elseif ( $confirm_pass == false ) {
       	
          $massage = '<p class="alert alert-danger"> Password do not Match </p>';

       }elseif ( $uname_check == false ) {
       	
          $massage = '<p class="alert alert-warning"> User name allready exits! </p>';

       }elseif ( $email_check == false ) {
       	
          $massage = '<p class="alert alert-warning"> Email allready exits! </p>';

       }elseif ( $cell_check == false ) {
       	
          $massage = '<p class="alert alert-warning"> Cell allready exits! </p>';

       }else{
          
          $data = Uploadsystem($_FILES['photo'],'photo/',['jpg','png','jpeg']);
          $photo = $data['file_name'];
          
          $sql = "INSERT INTO usersss (name, uname, email, cell, password, photo, status) VALUES ('$name','$uname','$email','$cell','$hash_pass','$photo','active')";
          $connection -> query($sql);
          
          setMsg('Data Stable');

          header('location: registration.php');

       }

	 ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-4 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2 align="center">Registration Form</h2>
	 				<?php 
                        
                        if ( isset($massage) ) {
                        	
                        	echo $massage;

                        }

                        getMsg();
 
	 				 ?>
	 			</div>
	 			<div class="card-body"> 
	 				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
	 					
	 					<label>Name</label>
	 					<input type="text" placeholder="Name" class="form-control" name="name" value="<?php old('name'); ?>">

	 					<label>User Name</label>
	 					<input type="text" placeholder="User Name" class="form-control" name="uname" value="<?php old('uname'); ?>">

	 					<label>Email</label>
	 					<input type="text" placeholder="Email" class="form-control" name="email" value="<?php old('email'); ?>">

	 					<label>Cell</label>
	 					<input type="text" placeholder="Cell" class="form-control" name="cell" value="<?php old('cell'); ?>">

	 					<label>Password</label>
	 					<input type="Password" placeholder="Password" class="form-control" name="pass">

	 					<label>Confirm Password</label>
	 					<input type="Password" placeholder="Confirm Password" class="form-control" name="cpass">

	 					<label>Photo</label>
	 					<input type="file" name="photo">

	 					<input type="submit" class="btn btn-outline-info mt-2" value="Registration" name="Registration">
	 				</form>
	 			</div>
	 			<div class="card-footer">
	 				<a href="index.php">login now</a>
	 			</div>
	 		</div>
	 	</div>
	 </div>


      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
</body>
</html>