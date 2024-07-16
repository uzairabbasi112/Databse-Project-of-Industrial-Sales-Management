<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <title>Financial Transaction Management</title>
	<link rel="stylesheet" href="style.css">

</head>
<style>
body{
    background: url("img/usa-utah-colorful-rocks-in-lake-powell-jaynes-gallery.jpg") no-repeat center fixed ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
  }
</style>
<?php
include 'includes/config.php';
include 'includes/session.php';
      if (isset($_POST['signin'])) {
        $name = $_POST["rock"];
        $price = $_POST["price"];
        $sql = "UPDATE rock set Rate = $price where RockID = $name";
          
          $query = mysqli_query($conn,$sql);

         
if ($conn->query($sql) === TRUE) {
     "<script>alert('Data inserted successfully...')</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
      }
?>

<style>
    /* styles.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
  color: #333;
}

/* form {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
} */

.form-group {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

caption {
  text-align: left;
  font-weight: bold;
  margin-bottom: 10px;
}

thead th {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: left;
}

tbody td {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

tbody tr:last-child td {
  border-bottom: none;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}
  .custom-select {
    position: relative;
    display: inline-block;
    font-family: Arial, sans-serif;
    padding: 10px;
    width: 100%;
  }

  .custom-select select {
    display: inline-block;
    padding: 8px 40px 8px 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
  }

  .custom-select::after {
    content: '\25BC';
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #888;
    pointer-events: none;
  }
</style>
<body>
  	<!-- SIDEBAR -->
	<?php include 'includes/left_side_bar.php';
?>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->

		<!-- NAVBAR -->
<?php include 'includes/navbar.php';
?>
  <div class="container"  style="background-color: #012b39;color:aliceblue;">
    <h1 style="color: white;margin-bottom:20px">Enter Updated Rock Price</h1>
    
    <form action="" name="signin" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-5">Rock Name</label>
      <div class="col-sm-7">
          <?php 
          $sql = "SELECT* FROM rock";
          $info = mysqli_query($conn,$sql);   
          ?>
          <select class="form-control custom-select" name="rock"  id="rock" required>
              <option value="">Select Rock</option>
              <?php while($row = mysqli_fetch_assoc($info)){ ?>
              <option value="<?php echo $row['RockID']; ?>"><?php echo $row['RockType']; ?></option>
              <?php } ?>
          </select>
      </div>
    </div>
      
      <div class="form-group">
					<label for="weight">Price:</label>
					<input type="text" class="form-control" id="price" name="price">
			</div>
      <?php 
      $sql = "SELECT `Weight`,Rate , (`Weight` * `Rate`) AS `Total` from powder join rock on powder.RockID = rock.RockID";
      $info = mysqli_query($conn,$sql);  
      $row = mysqli_fetch_assoc($info);
      ?>
      <div class="form-group">
      <input required name="signin" id="signin" type="submit" value="Enter Sales">
      </div>
    </form>
	<script src="script.js"></script>
 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function() {
      $("#datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        altFormat: 'yy-mm-dd'
      });
    });
  </script>
  <style>
    .ui-datepicker {
      background-color: white;
    }
    .ui-datepicker-trigger {
      cursor: pointer;
      margin-left: 5px;
    }
  </style>

</body>
</html>
