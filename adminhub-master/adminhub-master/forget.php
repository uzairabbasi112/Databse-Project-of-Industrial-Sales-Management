<?php
session_start();
include('includes/config.php');
$username=$_SESSION['username'];
if(isset($_POST['signin']))
{

	$question=$_POST['question'];
	$answer=$_POST['answer'];

	$sql ="SELECT * FROM users where username ='$username' AND `Answer` ='$answer'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if($row['user_role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['ID'];
		    	$_SESSION['user_role']=$row['user_role'];
			 	echo "<script type='text/javascript'> document.location = 'update_password.php'; </script>";
		    }
		}

	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <?php
    $sql = "select * from users where username = '$username'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    ?>
    <form name="signin" method="post">
    <div class="login_form_container">
      <div class="login_form">
        <h2>Login</h2>
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input required type="text" name="question" value="<?php echo $row['Question']?>" class="input_text" autocomplete="off">
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input required type="password"  name="answer" class="input_text" autocomplete="off">
        </div>
        <div class="button_group" id="login_button" >
          <!-- <a name="signin" id="signin" type="submit">Submit</a> -->
          <input required name="signin" id="signin" type="submit" value="Sign In">
        </div>
      </div>
    </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>