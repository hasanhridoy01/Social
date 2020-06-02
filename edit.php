
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

        //GEt Data Recive
        $single_id = '';
        if ( isset($_GET['id']) ) {
            
          $id = $_GET['id']; 

        }

        
        if ( isset($_POST['Update']) ) {
        	
        	//data Receive
        	$name = $_POST['name'];
        	$uname = $_POST['uname'];
        	$email = $_POST['email'];
        	$cell = $_POST['cell'];


           //data check
           $uname_check = datacheck($connection, 'uname', $uname, 'usersss');
           $email_check = datacheck($connection, 'email', $email, 'usersss');
           $cell_check = datacheck($connection, 'cell', $cell, 'usersss');

        }

        if ( empty($name) || empty($uname) || empty($email) || empty($cell) ) {
        	
           $massage = '<p class="alert alert-danger"> All files are requide! </p>';

        }elseif ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
        	
           $massage = '<p class="alert alert-danger"> Invalid Email </p>';

        }else{

          if ( isset($_FILES['new photo']['name']) ) {
            
             $data = Uploadsystem($_FILES['new photo'],'photo/');
             $photo_name = $data['file_name'];

          }else{
            
            $photo_name = $_POST['old photo'];


          }
          
          $photo = $data['file_name'];
          $sql = "UPDATE usersss SET 
             
             name = '$name',
             uname = '$uname',
             email = '$email',
             cell = '$cell',
             photo = '$photo_name'
             WHERE id='$id'

          ";
          $connection -> query($sql);

          setMsg('Data Stable'); 

        }

        //Database Data reecive
         $sql = "SELECT * FROM usersss WHERE id='$id'";
         $data = $connection -> query($sql);
         $Single_data = $data -> fetch_assoc();


      ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-4 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2 align="center">Registration Form</h2>
          <a href="data.php" class="btn btn-outline-info btn-sm mb-2">View All Mumber</a>
	 				<?php 
                      
                      if ( isset($massage) ) {
                      	
                      	echo $massage;

                      }

                      getMsg();

	 				 ?>
	 			</div>
	 			<div class="card-body">
	 				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
	 					
	 					<label>Name</label>
	 					<input type="text" placeholder="Name" class="form-control" name="name" value="<?php echo $Single_data['name']; ?>">

	 					<label>User Name</label>
	 					<input type="text" placeholder="User Name" class="form-control" name="uname" value="<?php echo $Single_data['uname']; ?>">

	 					<label>Email</label>
	 					<input type="text" placeholder="Email" class="form-control" name="email" value="<?php echo $Single_data['email']; ?>">

	 					<label>Cell</label>
	 					<input type="text" placeholder="Cell" class="form-control" name="cell" value="<?php echo $Single_data['cell']; ?>">

            <div class="from-group">
              <img src="photo/<?php echo $Single_data['photo']; ?>" style="height: 110px; width: 170px;" class="mt-2 mb-2">
              <input type="hidden" name="old photo" value="<?php echo $Single_data['photo']; ?>">
            </div>

	 					<label>Photo</label>
	 					<input type="file" name="new photo">

	 					<input type="submit" class="btn btn-outline-info mt-2" value="Update" name="Update">
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