
<?php include_once "apps/db.php"; ?>
<?php include_once "apps/function.php"; ?>
<?php session_start(); ?>

<?php 

   if ( isset($_COOKIE['user_login_data']) ) {
   	
         $user_id = $_COOKIE['user_login_data'];
         $sql = "SELECT * FROM usersss WHERE id='$user_id'";
         $data = $connection -> query($sql);
         $user_login_data = $data -> fetch_assoc();

         //Session Value receive
         $_SESSION['id'] = $user_login_data['id'];
         $_SESSION['name'] = $user_login_data['name'];
         $_SESSION['email'] = $user_login_data['email'];
         $_SESSION['cell'] = $user_login_data['cell'];
         $_SESSION['uname'] = $user_login_data['uname'];
         $_SESSION['photo'] = $user_login_data['photo'];

         //Relogin System
         header('location:profile.php');


   }
      
    //Login security
   if ( isset($_SESSION['id']) AND isset($_SESSION['name']) AND isset($_SESSION['email']) ) {
   	 	
   	 	header('location:index.php');

    }


 ?>

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
          	
          	  $ue = $_POST['ue'];
          	  $pass = $_POST['pass'];

          }

          if ( empty($ue) || empty($pass) ) {
          	
          	 $massage = '<p class="alert alert-danger"> All files are requide! </p>';

          }else{
             
             $sql = "SELECT * FROM usersss WHERE uname='$ue' OR email='$ue'";
             $data = $connection -> query($sql);
             $user_login_data = $data -> fetch_assoc();
             $count = $data -> num_rows;
             
             if ( $count == 1 ) {
             	
                 if ( password_verify($pass, $user_login_data['password']) ) {
                    
                    //Session Value receive
                 	$_SESSION['id'] = $user_login_data['id'];
                 	$_SESSION['name'] = $user_login_data['name'];
                 	$_SESSION['email'] = $user_login_data['email'];
                 	$_SESSION['cell'] = $user_login_data['cell'];
                 	$_SESSION['uname'] = $user_login_data['uname'];
                 	$_SESSION['photo'] = $user_login_data['photo'];

                 	//set cookie
                 	setcookie('user_login_data',$user_login_data['id'], time() + (60*60*24*365*10));


                 	//Relogin System
                    header('location:profile.php');

                 }else{
                    
                    $massage = '<p class="alert alert-success"> Wrong password </p>';

                 }

             }else{
               
               $massage = '<p class="alert alert-success"> Wrong UserName/Email </p>';

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
	  				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	  					
	  					<label>UserName/Email</label>
	  					<input type="text" placeholder="UserName/Email" class="form-control" name="ue">

	  					<label>Password</label>
	  					<input type="password" placeholder="Password" class="form-control" name="pass">

	  					<input type="submit" value="login now" class="btn btn-outline-info mt-2" name="login">

	  				</form>
	  			</div>
	  			<div class="card-footer">
	  				<a href="registration.php">Creat an account</a>
	  			</div>
	  		</div>
	  	</div>
	  </div>

      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
</body>
</html>