<?php include('includes/session.php')?>
<?php include('includes/config.php')?>
<?php
	if(isset($_POST['add_staff']))
	{
	
	$fname=$_POST['username'];
	$password=md5($_POST['password']); 
	$user_role=$_POST['user_role']; 
	$CNIC=$_POST['CNIC']; 
	$phonenumber=$_POST['Number']; 
	$address=$_POST['Address']; 

	 $query = mysqli_query($conn,"select * from users where username = '$fname'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO users(username,`password`,user_role,Address,Number,CNIC) VALUES('$fname','$password','$user_role','$address','$phonenumber',$CNIC)         
		") or die(mysqli_error()); ?>
		<script>alert('Staff Records Successfully  Added');</script>;
		<script>
		window.location = "index.php"; 
		</script>
		<?php   }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="signup.css" />
  </head>
  <body>
  <form method="post" action="">
    <div class="login_form_container">
      <div class="login_form">
        <h2>SIGNUP</h2>

        <div class="input_group">
          <i class="fa fa-user"></i>
          <input required type="text" placeholder="Username" name="username" class="input_text" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input required type="password" placeholder="Password" name="password" class="input_text" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input required type="text" placeholder="user_role" name="user_role" class="input_text" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input required type="text" placeholder="CNIC" class="input_text" name="CNIC" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input required type="text" placeholder="Address" name="Address" class="input_text" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input required type="text" placeholder="Number" name="Number" class="input_text" autocomplete="off">
        </div>
        <div class="fotter mb-0">
          <a>Forgot Password ?</a>
          <a href="login.php">LOGIN</a>
        </div>
        <div class="button_group mt-0" id="login_button" style="top: -50px;">
          <button class="btn" name="add_staff" id="add_staff" data-toggle="modal">Sign up</button>
        </div>

      </div>
    </div>
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="login.js"></script>
</body>
</html>