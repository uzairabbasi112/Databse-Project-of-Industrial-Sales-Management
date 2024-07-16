<?php
include 'includes/session.php';
include 'includes/config.php';
$session_id=$_SESSION['alogin'];

// auth check
$user_id = $_SESSION['alogin'];
$sql = "SELECT * FROM users WHERE ID = $user_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$user_name = $row['username'];
if ($user_id == NULL) {
    header('Location: login.php');
}

// check admin
$user_role = $row['user_role'];

$task_id = $_GET['task_id'];
$sss = "SELECT * from sales where SalesID = $task_id";
$info111 = mysqli_query($conn, $sss);
$row111 = mysqli_fetch_assoc($info111);
$cus_id = $row111['CustomerID'];
if (isset($_POST['update_task_info'])) {
    $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $update_task = "UPDATE sales SET  CustomerID = $CustomerID, Quantity= '$Quantity' WHERE task_id = $task_id";
    $result = mysqli_query($conn, $update_task);
    if ($result) {
        $_SESSION['Task_msg'] = 'Task Update Successfully';
        header('Location: task-info.php');
        exit();
    } else {
        echo "Error updating task: " . mysqli_error($conn);
    }
}

$page_name = "Edit Task";
$sql = "SELECT * FROM sales WHERE SalesID = $task_id";
$info = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($info);

?>

<!--modal for employee add-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
</style>
<?php
include 'includes/config.php';
$weight1 = 0;
$weight2 = 0;
$weight3 = 0;
// $date = date('Y-m-d', strtotime($_POST["date"]));

      if (isset($_POST['signin'])) {
        $name = $_POST["assign_to"];
        $sql444 = "select * from customer where CustomerName = '$name'";
        $query444 = mysqli_query($conn,$sql444);
        $res = mysqli_fetch_assoc($query444);
        $cus_id = $res['CustomerID'];
        $date = date('Y-m-d', strtotime($_POST["date"]));
        $typeofrock = $_POST["typeofrock"];
        if(isset($_POST['weight_of_first_rock'])){
          $weight1 = $_POST["weight_of_first_rock"];
        }
        if(isset($_POST['weight_of_second_rock'])){
          $weight2 = $_POST["weight_of_second_rock"];
        }
        if(isset($_POST['weight_of_third_rock'])){
          $weight3 = $_POST["weight_of_third_rock"];
        }
        $weight = $weight1 + $weight2 + $weight3;
        
          // Insert data into the customer table
          $sql = "INSERT into powder(RockID,Weight) values ($typeofrock,$weight)";
          $query = mysqli_query($conn,$sql);
          $powderid = mysqli_insert_id($conn);
          $sql1 = "SELECT * from rock where RockID = $typeofrock";
          $sql2 = "INSERT into transaction(Date) values('$date')";
          $query = mysqli_query($conn,$sql2);
          $transactionid = mysqli_insert_id($conn);
          $query1 = mysqli_query($conn, $sql1);
          $row = mysqli_fetch_assoc($query1);
          $rate = $row['Rate'];
          $totalamount = $rate * $weight;
          $update_task = "UPDATE sales SET  CustomerID = $cus_id,TotalAmount = $totalamount, PowderID = $powderid WHERE SalesID = $task_id";
          $result = mysqli_query($conn, $update_task);
          if ($result) {
              $_SESSION['Task_msg'] = 'Task Update Successfully';
              header('Location: task-info.php');
              exit();
          } else {
              echo "Error updating task: " . mysqli_error($conn);
          }
// Execute the query
if ($conn->query($sql3) === TRUE) {
     "<script>alert('Data inserted successfully...')</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Close the database connection
// $conn->close();
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
    <h1 style="color: white;margin-bottom:20px">Update Sale Record</h1>
    <?php
    
    $task_id = $_GET['task_id'];
    // $sss = "SELECT * from sales where SalesID = $task_id";
    // $query = mysqli_query($conn,$sss);
    $sql = "SELECT s.SalesID as ID, c.CustomerName AS 'Customer Name', r.RockType AS 'Type of Rock', SUM(p.Weight) AS 'Total Weight', s.TotalAmount AS 'Total Amount', t.Date AS TransactionDate FROM sales s JOIN customer c ON s.CustomerID = c.CustomerID JOIN powder p ON s.PowderID = p.PowderID JOIN rock r ON p.RockID = r.RockID JOIN transaction t ON s.TransactionID = t.TransactionID  GROUP BY c.CustomerName, r.RockType, s.TotalAmount  ;";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    ?>
    
    <form action="" name="signin" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-5">Customer Name</label>
      <div class="col-sm-7">
          <?php 
          $sql = "SELECT CustomerID, CustomerName FROM customer";
          $info = mysqli_query($conn,$sql); 
          $sql1 = "select * from sales where SalesID = $task_id;"; 
          $query1 = mysqli_query($conn,$sql1);

          $ress = mysqli_fetch_assoc($query1);
          $customerid = $ress['CustomerID'];
          $date = $ress['TransactionID'];
          $powderid = $ress['PowderID'];

          $sql2 = "select * from customer where CustomerID = $customerid";
          $query2 = mysqli_query($conn,$sql2);
          $resu=mysqli_fetch_assoc($query2);
          

          ?>
          <select class="form-control custom-select" name="assign_to"  id="aassign_to" required>
              <option><?php echo $resu['CustomerName']; ?></option>
              <?php while($row = mysqli_fetch_assoc($info)){ ?>
              <option value="<?php echo $row['CustomerID']; ?>"><?php echo $row['CustomerName']; ?></option>
              <?php } ?>
          </select>
      </div>
    </div>
      
      <div class="form-group">
        <label for="ContactNumber">Date</label>
        <?php 
        $sql = "select * from transaction where  TransactionID    = '$date'";
        $query = mysqli_query($conn,$sql);
        $resss = mysqli_fetch_assoc($query);
        $d = $resss['Date'];
        // die($d);
        
        ?>
        <input type="text" id="datepicker" value="<?php echo $d ?>" name="date" placeholder="Select a date">
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-5">Enter Rock Type</label>
      <div class="col-sm-7">
      <?php 
        $sql = "select * from powder where  PowderID    = '$powderid'";
        $query = mysqli_query($conn,$sql);
        $resss = mysqli_fetch_assoc($query);
        $d = $resss['RockID'];
        // die($d);
        
        ?>
          <?php 
          $sql = "SELECT * FROM rock";
          $info = mysqli_query($conn,$sql);  
          ?>
          <select class="form-control custom-select" name="typeofrock"  id="typeofrock" required onchange="showInputs()">
              <option value="">Select Rock</option>
              <option value="1">Lums</option>
              <option value="2">Phosphate</option>
              <option value="3">Copper</option>
              <option value="4">Lums + Phosphate</option>
              <option value="5">Phosphate + Copper</option>
              <option value="6">Copper + Lump</option>
              <option value="7">Lums + Phosphate + Copper</option>
          </select>
      </div>
      
      <div class="form-group">
          <label for="weight">Weight:</label>
          <div id="inputContainer" class="form-group" style="padding-bottom: 20px;">
            <!-- Input tags will be dynamically added here -->
          </div>
      </div>
    </div>
      
      <?php 
      $sql = "SELECT `Weight`,Rate , (`Weight` * `Rate`) AS `Total` from powder join rock on powder.RockID = rock.RockID";
      $info = mysqli_query($conn,$sql);  
      $row = mysqli_fetch_assoc($info);
      ?>
      <div class="form-group">
      <input required name="signin" id="signin" type="submit" value="Update Sales">
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

    <script>
    function showInputs() {
        var select = document.getElementById("typeofrock");
        var inputContainer = document.getElementById("inputContainer");
        inputContainer.innerHTML = ""; // Clear previous inputs

        var selectedValue = select.value;

        if (selectedValue === "1" || selectedValue === "2" || selectedValue === "3") {
            var input1 = document.createElement("input");
            input1.type = "text";
            input1.name = "weight_of_first_rock";
            input1.placeholder = "Weight Of First Rock";
            inputContainer.appendChild(input1);
        }

        if (
            selectedValue === "4" ||
            selectedValue === "5" ||
            selectedValue === "6"
        ) {
            var input2 = document.createElement("input");
            var input4 = document.createElement("input");
            input2.type = "text";
            input2.name = "weight_of_first_rock";
            input2.placeholder = "Weight Of First Rock";

            input4.type = "text";
            input4.name = "weight_of_second_rock";
            input4.placeholder = "Weight Of Second Rock";

            inputContainer.appendChild(input2);
            inputContainer.appendChild(input4);

            
        }

        if (selectedValue === "7") {
            var input3 = document.createElement("input");
            var input5 = document.createElement("input");
            var input6 = document.createElement("input");
            input3.type = "text";
            input3.name = "weight_of_first_rock";
            input3.placeholder = "Weight Of First Rock";
            input6.type = "text";
            input6.name = "weight_of_second_rock";
            input6.placeholder = "Weight Of Second Rock";
            input5.type = "text";
            input5.name = "weight_of_third_rock";
            input5.placeholder = "Weight Of Third Rock";

            inputContainer.appendChild(input3);
            inputContainer.appendChild(input6);
            inputContainer.appendChild(input5);
        }
    }
</script>

</body>
</html>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script type="text/javascript">
    flatpickr('#t_start_time', {
        enableTime: true
    });

    flatpickr('#t_end_time', {
        enableTime: true
    });

</script>

