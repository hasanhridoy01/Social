
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logn In From</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
      
      <?php 

          if ( isset($_POST['login']) ) {
          	
          	  $pass = $_POST['pass'];

          }

          if ( empty($pass) ) {
          	
          	 $massage = '<p class="alert alert-danger"> All files are requide! </p>';

          }else{
             
             $sql = "SELECT * FROM usersss";
             $data = $connection -> query($sql);
             $user_login_data = $data -> fetch_assoc();
             	
                 if ( password_verify($pass, $user_login_data['password']) == true ) {
                    
                   
                 	//Relogin System
                  header('location:profile.php');

                 }else{
                    
                    $massage = '<p class="alert alert-success"> Wrong password </p>';

                 }

             
             
          
          }

       ?>

	  <div class="container">
	  	<div class="row">
	  		<div class="card mt-5 mx-auto shadow-lg">
	  			<div class="card-header">
	  				<h2 align="center">login From</h2>
	  				<?php 
                       
                        if ( isset($massage) ) {
                        	
                        	echo $massage;

                        }

	  				 ?>
	  			</div>
	  			<div class="card-body">
            <img src="photo/$user_login_data['photo']" alt="" style="height: 50px; width: 80px; border-radius: 50%; padding: 30px;">
	  				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	  					<label>Password</label>
	  					<input type="password" placeholder="Password" class="form-control" name="pass">

	  					<input type="submit" value="login now" class="btn btn-outline-info mt-2" name="login">

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