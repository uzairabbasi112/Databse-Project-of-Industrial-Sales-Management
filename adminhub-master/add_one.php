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
    background: url("img/stones-1.jpg") ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
  }
</style>
<?php
include 'includes/config.php';
include 'includes/session.php';
      if (isset($_POST['signin'])) {
        $name = $_POST["name"];
        $contactNumber = $_POST["ContactNumber"];
        $address = $_POST["Address"];
        $CNIC = $_POST["CNIC"];
        $password = $_POST["password"];
        $type = $_POST["type"];
        $Favourite = $_POST["Favourite"];
        $staff = 'staff';
      if ($type == "customer") {
          // Insert data into the customer table
          $query = "INSERT INTO customer (CustomerName, ContactNumber, Address) VALUES ('$name', '$contactNumber', '$address')";
      } elseif ($type == "dealer") {
          // Insert data into the dealer table
          $query = "INSERT INTO dealer (DealerName, ContactNumber, Address) VALUES ('$name', '$contactNumber', '$address')";
      } elseif ($type == "worker") {
          // Insert data into the worker table (if it exists)
          $query = "INSERT INTO users (username, `Number`, `Address`,CNIC,`password`,user_role,Question,Answer) VALUES ('$name', '$contactNumber', '$address',$CNIC,'$password','$staff','Enter Your Favourite Number','$Favourite')";
          // die($query);
      }

// Execute the query
if ($conn->query($query) === TRUE) {
     "<script>alert('Data inserted successfully...')</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
      }
?>

<style>
    /* styles.css */
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
    <h1 style="color: white;margin-bottom:20px">ADD ( CUSTOMER / DEALER / WORKER )</h1>
    
    <form action="" name="signin" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required>
      </div>
      
      <div class="form-group">
        <label for="ContactNumber">Contact Number:</label>
        <input type="text" id="ContactNumber" name="ContactNumber" placeholder="Enter Contact Number" required>
      </div>
      
      <div class="form-group">
        <label for="Address">Address:</label>
        <input type="text" id="Address" name="Address" placeholder="Enter Address" required>
      </div>
      
      <div class="form-group">
					<label for="paid">Type:</label>
					<select name="type" class="custom-select" id="type" onchange="toggleWorkerInputs()">
						<option value="customer">Customer</option>
						<option value="dealer">Dealer</option>
						<option value="worker">Worker</option>
					</select>
				</div>
        

				<!-- Additional input tags for Worker type -->
				<div id="workerInputs" style="display: none;">
					<div class="form-group">
						<label for="workerInput1">Password</label>
						<input type="text" id="workerInput1" name="password" placeholder="EnterPassword">
					</div>

          <div class="form-group">
						<label for="workerInput3">Favourite Number:</label>
						<input type="text" id="workerInput3" name="Favourite" placeholder="Enter Favourite Number">
					</div>
					
					<div class="form-group">
						<label for="workerInput2">CNIC:</label>
						<input type="text" id="workerInput2" name="CNIC" placeholder="Enter CNIC">
					</div>
          
				</div>
      <div class="form-group">
      <input required name="signin" id="signin" type="submit" value="Add">
      </div>
    </form>
	<script src="script.js"></script>
  <script>
			function toggleWorkerInputs() {
				const typeSelect = document.getElementById("type");
				const workerInputs = document.getElementById("workerInputs");

				if (typeSelect.value === "worker") {
					workerInputs.style.display = "block";
				} else {
					workerInputs.style.display = "none";
				}
			}
		</script>

</body>
</html>
