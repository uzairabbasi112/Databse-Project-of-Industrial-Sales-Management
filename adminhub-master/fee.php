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
<?php include 'includes/left_side_bar.php'; ?>
<!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->

    <!-- NAVBAR -->
    <?php include 'includes/navbar.php'; ?>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-custom" style="background-color: #012b39;color:aliceblue;">
                <div class="gap"></div>
                <center><h2 style="font-weight: 800;margin-bottom:50px" >Salary Payment</h2></center>
                <div class="gap"></div>
                <div class="gap"></div>
                <div class="table-responsive">
                    <table class="table table-codensed table-custom" style="color: white;">
                        <thead>
                            <tr>
                                <th>Worker Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>CNIC</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql1 = "SELECT * from users";
                            $info = mysqli_query($conn,$sql1);
                            $num_row = mysqli_num_rows($info);
                            if($num_row == 0){
                                echo '<tr><td colspan="7">No Data found</td></tr>';
                            }
                            while($row = mysqli_fetch_assoc($info)){
                            ?>
                            <tr>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['Number']?></td>
                                <td><?php echo $row['Address']?></td>
                                <td><?php echo $row['CNIC']?></td>
                                <td>
                                    <?php
                                    if ($row['fee'] > 0) {
                                        echo '<button class="btn btn-dark" onclick="payAmount(' . $row['ID'] . ', this)">PAY Amount</button>';
                                    } else {
                                        echo '<button class="btn btn-success" disabled>Paid</button>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

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

    function payAmount(dealerId, button) {
        var confirmPayment = confirm("Are you sure you want to mark the amount as paid?");
        if (confirmPayment) {
            // Update the remaining amount in the database
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the button style and text
                    button.classList.remove('btn-dark');
                    button.classList.add('btn-success');
                    button.innerText = 'Paid';
                    button.disabled = true;
                }
            };
            xmlhttp.open("GET", "salary.php?dealer_id=" + dealerId, true);
            xmlhttp.send();
        }
    }
</script>
