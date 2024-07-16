<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="style_chart.css">

	<title>AdminHub</title>
</head>
<?php
include 'includes/config.php';
include 'includes/session.php';
?>
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
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<?php
				$sql = "SELECT * from users";
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($query);
				$count = mysqli_num_rows($query);
				?>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $count;?></h3>
						<p>Total Members</p>
					</span>
				</li>
				<li>
					<?php
					$sql = "SELECT * from rock";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($query);
					$count = mysqli_num_rows($query);
					?>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $count;?></h3>
						<p>Total Rock Types</p>
					</span>
				</li>
				<li>
					<?php
					$sql = "SELECT * from sales";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($query);
					$count = mysqli_num_rows($query);
					?>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
					<h3><?php echo $count;?></h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>

			
			<ul class="box-info">
				<?php
				$sql = "SELECT SUM(TotalAmount) As total_amount	FROM sales;";
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($query);
				?>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $row['total_amount'];?></h3>
						<p>Total Profit</p>
					</span>
				</li>
				<li>
					<?php
					$sql = "SELECT * from dealer ";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($query);
					$count = mysqli_num_rows($query);
					?>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $count;?></h3>
						<p>Total Dealers</p>
					</span>
				</li>
				<li>
					<?php
					$sql = "SELECT * from customer";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($query);
					$count = mysqli_num_rows($query);
					?>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
					<h3><?php echo $count;?></h3>
						<p>Total Customers</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Sales</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<?php
							$sql = "SELECT c.CustomerName AS 'Customer Name', r.RockType AS 'Type of Rock', SUM(p.Weight) AS 'Total Weight', s.TotalAmount AS 'Total Amount', t.Date AS TransactionDate FROM sales s JOIN customer c ON s.CustomerID = c.CustomerID JOIN powder p ON s.PowderID = p.PowderID JOIN rock r ON p.RockID = r.RockID JOIN transaction t ON s.TransactionID = t.TransactionID  GROUP BY c.CustomerName, r.RockType, s.TotalAmount;";
							$query = mysqli_query($conn,$sql);
							
							?>
							<tr>
								<th>Customer</th>
								<th>Rock Type</th>
								<th>Weight</th>
								<th>Total Amount</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($query)){?>
							<tr>
								<td>
									<img src="img/people.png">
									<p><?php echo $row['Customer Name']?></p>
								</td>
								<td><?php echo $row['Type of Rock']?></td>
								<td><?php echo $row['Total Weight']?></td>
								<td><?php echo $row['Total Amount']?></td>
								<td><?php echo $row['TransactionDate']?></td>
							</tr>

							<?php }?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Profit In this Year</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<div id="chart"></div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script src="chart.js"></script>
</body>
</html>