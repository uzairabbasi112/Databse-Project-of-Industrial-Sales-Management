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

$hod_added = 0;

$page_name = "Task_Info";
$role = $_SESSION['user_role'];
?>
<style>

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
            <center><h2 style="font-weight: 800;margin-bottom:50px" >View Customer Details</h2></center>
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="table-responsive">
                <table class="table table-codensed table-custom" style="color: white;">
                    <thead>
                            <tr>
								<th>Customer Name</th>
								<th>Number</th>
								<th>Address</th>
								<th>Paid Amount</th>
								<th>Date</th>
							</tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql1 = "SELECT * from customer join sales on customer.CustomerID = sales.CustomerID join transaction on sales.transactionID = transaction.TransactionID";
                        $info = mysqli_query($conn,$sql1);
                        $num_row = mysqli_num_rows($info);
                        if($num_row == 0){
                            echo '<tr><td colspan="7">No Data found</td></tr>';
                        }
                        while($row = mysqli_fetch_assoc($info)){
                        ?>
                        <tr>
								<td><?php echo $row['CustomerName']?></td>
								<td><?php echo $row['ContactNumber']?></td>
								<td><?php echo $row['Address']?></td>
								<td><?php echo $row['TotalAmount']?></td>
								<td><?php echo $row['Date']?></td>
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
