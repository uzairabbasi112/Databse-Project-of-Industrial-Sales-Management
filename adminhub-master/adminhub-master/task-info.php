<?php
include 'includes/config.php';
include 'includes/session.php';
include 'includes/header.php';


// auth check
$user_id = $_SESSION['alogin'];
$sql = "SELECT * from users where ID = $session_id";
$query = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_assoc($query);
$user_name = $row1['username'];
if ($user_id == NULL) {
    header('Location: login.php');
}

// check admin
$user_role = $_SESSION['user_role'];


if(isset($_GET['delete_task'])){
  $action_id = $_GET['task_id'];
  
  $sql = "DELETE FROM task_info WHERE task_id = $action_id";
  $_SESSION['Task_msg'] = 'Task Deleted Successfully';
  header('Location: task-info.php');

}
$hod_added = 0;

$page_name = "Task_Info";
$role = $_SESSION['user_role'];
?>
<style>
body{
    background: url("img/stones-1.jpg") ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
  }
</style>

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
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<div class="row">
    <div class="col-md-12">
        <div class="well well-custom" style="background-color: #012b39;color:aliceblue;">
            <div class="gap"></div>
            <center><h2 style="font-weight: 800;margin-bottom:50px" >View Sales</h2></center>
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="table-responsive">
                <table class="table table-codensed table-custom" style="color: white;">
                    <thead>
                            <tr>
								<th>Customer</th>
								<th>Rock Type</th>
								<th>Weight</th>
								<th>Total Amount</th>
								<th>Date</th>
								<th>Edit</th>
							</tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql1 = "SELECT s.SalesID as ID, c.CustomerName AS 'Customer Name', r.RockType AS 'Type of Rock', SUM(p.Weight) AS 'Total Weight', s.TotalAmount AS 'Total Amount', t.Date AS TransactionDate FROM sales s JOIN customer c ON s.CustomerID = c.CustomerID JOIN powder p ON s.PowderID = p.PowderID JOIN rock r ON p.RockID = r.RockID JOIN transaction t ON s.TransactionID = t.TransactionID  GROUP BY c.CustomerName, r.RockType, s.TotalAmount;";
                        $info = mysqli_query($conn,$sql1);
                        $serial  = 1;
                        $num_row = mysqli_num_rows($info);
                        if($num_row == 0){
                            echo '<tr><td colspan="7">No Data found</td></tr>';
                        }
                        while($row = mysqli_fetch_assoc($info)){
                        ?>
                        <tr>
								<td><?php echo $row['Customer Name']?></td>
								<td><?php echo $row['Type of Rock']?></td>
								<td><?php echo $row['Total Weight']?></td>
								<td><?php echo $row['Total Amount']?></td>
								<td><?php echo $row['TransactionDate']?></td>
								<td><a title="Update Task"  href="edit-task.php?task_id=<?php echo $row['ID'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="script.js"></script>

<script>
    flatpickr("#t_start_time", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        time_24hr: true
    });

    flatpickr("#t_end_time", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        time_24hr: true
    });
</script>
